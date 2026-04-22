<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class SchoolClassController extends Controller
{
    private function currentUser(): User
    {
        /** @var User $user */
        $user = Auth::user();

        return $user;
    }

    protected function getSchoolId(Request $request = null): ?int
    {
        $user = $this->currentUser();

        if ($user->school_id) {
            return $user->school_id;
        }

        return $request?->input('school_id');
    }

    protected function classQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = $this->currentUser();

        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            return SchoolClass::where('is_active', true);
        }

        return SchoolClass::where('school_id', $user->school_id)->where('is_active', true);
    }

    protected function sectionQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = $this->currentUser();

        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            return Section::where('is_active', true);
        }

        return Section::where('school_id', $user->school_id)->where('is_active', true);
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));
        $column = $request->input('column');

        $classes = $this->classQuery()
            ->withCount(['sections' => fn ($query) => $query->where('is_active', true), 'students'])
            ->with(['school', 'sections' => function ($query) {
                $query->withCount('students')->where('is_active', true)->orderBy('name');
            }])
            ->when($search, function ($query, $search) use ($column) {
                $query->where(function ($query) use ($search, $column) {
                    if ($column === 'school') {
                        $query->whereHas('school', fn ($q) => $q->where('name', 'like', "%{$search}%"));
                        return;
                    }

                    $fields = ['number', 'display_number', 'name'];
                    if (in_array($column, $fields, true)) {
                        $query->where($column, 'like', "%{$search}%");
                        return;
                    }

                    $query->where('number', 'like', "%{$search}%")
                        ->orWhere('display_number', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhereHas('school', fn ($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->orderBy('number')
            ->paginate(12)
            ->withQueryString();

        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $schools = [];
        if ($this->currentUser()->hasAnyRole(['admin', 'super_admin'])) {
            $schools = School::orderBy('name')->get();
        }

        return view('admin.classes.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $schoolId = $this->getSchoolId($request);

        $request->validate([
            'school_id' => [
                Rule::requiredIf(fn () => $this->currentUser()->hasAnyRole(['admin', 'super_admin']) && !$this->getSchoolId($request)),
                'nullable',
                'exists:schools,id',
            ],
            'number' => [
                'required',
                'string',
                'max:100',
                Rule::unique('school_classes')->where(fn ($query) => $query->where('school_id', $schoolId)),
            ],
            'display_number' => ['nullable', 'string', 'max:20'],
            'name' => ['nullable', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $number = trim((string) $request->input('number'));
        $displayNumber = $request->input('display_number') ?: SchoolClass::toRoman($number);
        $name = $request->input('name') ?: (strcasecmp($number, '0') === 0 || strcasecmp($number, 'nursery') === 0 ? 'Nursery' : sprintf('Class %s', $number));

        SchoolClass::create([
            'school_id' => $schoolId,
            'number' => $number,
            'display_number' => $displayNumber,
            'name' => $name,
            'description' => $request->input('description'),
        ]);

        return Redirect::route('admin.classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $schools = [];
        if ($this->currentUser()->hasAnyRole(['admin', 'super_admin'])) {
            $schools = School::orderBy('name')->get();
        }

        return view('admin.classes.edit', compact('schoolClass', 'schools'));
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $schoolId = $this->getSchoolId($request) ?: $schoolClass->school_id;

        $request->validate([
            'school_id' => [
                Rule::requiredIf(fn () => $this->currentUser()->hasAnyRole(['admin', 'super_admin']) && !$this->getSchoolId($request)),
                'nullable',
                'exists:schools,id',
            ],
            'number' => [
                'required',
                'string',
                'max:100',
                Rule::unique('school_classes')->where(fn ($query) => $query->where('school_id', $schoolId))->ignore($schoolClass->id),
            ],
            'display_number' => ['nullable', 'string', 'max:20'],
            'name' => ['nullable', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $number = trim((string) $request->input('number'));
        $displayNumber = $request->input('display_number') ?: SchoolClass::toRoman($number);
        $name = $request->input('name') ?: (strcasecmp($number, '0') === 0 || strcasecmp($number, 'nursery') === 0 ? 'Nursery' : sprintf('Class %s', $number));

        $schoolClass->update([
            'school_id' => $schoolId,
            'number' => $number,
            'display_number' => $displayNumber,
            'name' => $name,
            'description' => $request->input('description'),
        ]);

        return Redirect::route('admin.classes.index')->with('success', 'Class updated successfully.');
    }

    public function show(SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $schoolClass->load(['sections' => function ($query) {
            $query->withCount('students')->orderBy('name');
        }]);

        $classStudents = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })
            ->where('school_class_id', $schoolClass->id)
            ->with('section')
            ->orderBy('name')
            ->get();

        return view('admin.classes.show', compact('schoolClass', 'classStudents'));
    }

    public function sectionsAllIndex()
    {
        $sections = Section::with('schoolClass')
            ->withCount('students')
            ->where('is_active', true)
            ->orderBy('name')
            ->paginate(15);

        $classes = $this->classQuery()->orderBy('name')->get();

        return view('admin.sections.index', compact('sections', 'classes'));
    }

    public function sectionsIndex(SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $sections = $schoolClass->sections()->withCount('students')->where('is_active', true)->orderBy('name')->get();

        return view('admin.classes.sections.index', compact('schoolClass', 'sections'));
    }

    public function createSection(SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        return view('admin.classes.sections.create', compact('schoolClass'));
    }

    public function storeSection(Request $request, SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                Rule::unique('sections')->where(fn ($query) => $query->where('school_class_id', $schoolClass->id)),
            ],
            'display_name' => ['nullable', 'string', 'max:40'],
        ]);

        $displayName = $request->input('display_name') ?: sprintf('Section %s', strtoupper($request->input('name')));

        Section::create([
            'school_id' => $schoolClass->school_id,
            'school_class_id' => $schoolClass->id,
            'name' => strtoupper($request->input('name')),
            'display_name' => $displayName,
            'is_active' => true,
        ]);

        return Redirect::route('admin.classes.show', $schoolClass)->with('success', 'Section created successfully.');
    }

    public function editSection(SchoolClass $schoolClass, Section $section)
    {
        $this->authorizeSchoolClass($schoolClass);
        $this->authorizeSection($schoolClass, $section);

        return view('admin.classes.sections.edit', compact('schoolClass', 'section'));
    }

    public function updateSection(Request $request, SchoolClass $schoolClass, Section $section)
    {
        $this->authorizeSchoolClass($schoolClass);
        $this->authorizeSection($schoolClass, $section);

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                Rule::unique('sections')->where(fn ($query) => $query->where('school_class_id', $schoolClass->id))->ignore($section->id),
            ],
            'display_name' => ['nullable', 'string', 'max:40'],
        ]);

        $displayName = $request->input('display_name') ?: sprintf('Section %s', strtoupper($request->input('name')));

        $section->update([
            'name' => strtoupper($request->input('name')),
            'display_name' => $displayName,
            'is_active' => true,
        ]);

        return Redirect::route('admin.classes.show', $schoolClass)->with('success', 'Section updated successfully.');
    }

    public function destroySection(SchoolClass $schoolClass, Section $section)
    {
        $this->authorizeSchoolClass($schoolClass);
        $this->authorizeSection($schoolClass, $section);

        $section->update(['is_active' => false]);

        return Redirect::route('admin.classes.show', $schoolClass)->with('success', 'Section removed successfully.');
    }

    public function storeSectionGlobal(Request $request)
    {
        $request->validate([
            'school_class_id' => [
                'required',
                'integer',
                Rule::exists('school_classes', 'id')->where(fn ($query) => $query->where('is_active', true)),
            ],
            'name' => [
                'required',
                'string',
                'max:10',
                Rule::unique('sections')->where(fn ($query) => $query->where('school_class_id', $request->input('school_class_id'))),
            ],
            'display_name' => ['nullable', 'string', 'max:40'],
        ]);

        $schoolClass = SchoolClass::findOrFail($request->input('school_class_id'));

        $displayName = $request->input('display_name') ?: sprintf('Section %s', strtoupper($request->input('name')));

        Section::create([
            'school_id' => $schoolClass->school_id,
            'school_class_id' => $schoolClass->id,
            'name' => strtoupper($request->input('name')),
            'display_name' => $displayName,
            'is_active' => true,
        ]);

        return Redirect::route('admin.sections.index')->with('success', 'Section created successfully.');
    }

    public function destroySectionGlobal(Section $section)
    {
        if (!$section->is_active) {
            abort(404);
        }

        $section->update(['is_active' => false]);

        return Redirect::route('admin.sections.index')->with('success', 'Section removed successfully.');
    }

    public function destroy(SchoolClass $schoolClass)
    {
        $this->authorizeSchoolClass($schoolClass);

        $schoolClass->update(['is_active' => false]);
        $schoolClass->sections()->update(['is_active' => false]);

        return Redirect::route('admin.classes.index')->with('success', 'Class removed successfully.');
    }

    public function showSection(SchoolClass $schoolClass, Section $section)
    {
        $this->authorizeSchoolClass($schoolClass);
        $this->authorizeSection($schoolClass, $section);

        $sectionStudents = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })
            ->where('section_id', $section->id)
            ->orderBy('name')
            ->get();

        return view('admin.classes.sections.show', compact('schoolClass', 'section', 'sectionStudents'));
    }

    protected function authorizeSchoolClass(SchoolClass $schoolClass): void
    {
        $user = $this->currentUser();
        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            if (!$schoolClass->is_active) {
                abort(404);
            }
            return;
        }

        if ($schoolClass->school_id !== $user->school_id || !$schoolClass->is_active) {
            abort(403);
        }
    }

    protected function authorizeSection(SchoolClass $schoolClass, Section $section): void
    {
        if ($section->school_class_id !== $schoolClass->id || !$section->is_active) {
            abort(404);
        }
    }
}
