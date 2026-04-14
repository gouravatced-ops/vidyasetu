@extends('admin.layouts.app')

@section('title', 'Class Details - VidyaSetu')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">Class Details</div>
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.index') }}">Classes</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <span>{{ $schoolClass->name }}</span>
                </div>
            </div>
            <div class="panel-actions">
                <a href="{{ route('admin.classes.index') }}" class="btn-add"><i class="fas fa-arrow-left"></i> Back</a>
                <a href="{{ route('admin.classes.sections.index', $schoolClass) }}" class="btn btn-outline-secondary" style="border-radius:6px; padding:8px 16px;">Sections</a>
                <a href="{{ route('admin.classes.sections.create', $schoolClass) }}" class="btn-add"><i class="fas fa-plus"></i> Add Section</a>
                <a href="{{ route('admin.classes.edit', $schoolClass) }}" class="btn btn-success" style="border-radius:6px; padding:8px 16px;">Edit Class</a>
            </div>
        </div>

        <div class="panel-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-muted">Class Number</h6>
                            <p class="card-text fs-5 mb-0">{{ $schoolClass->number }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-muted">Display Number</h6>
                            <p class="card-text fs-5 mb-0">{{ $schoolClass->display_number }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-muted">Sections</h6>
                            <p class="card-text fs-5 mb-0">{{ $schoolClass->sections->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-muted">Total Students</h6>
                            <p class="card-text fs-5 mb-0">{{ $classStudents->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="card-title text-uppercase text-muted">Description</h6>
                            <p class="card-text mb-0">{{ $schoolClass->description ?? 'No description added.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel mb-6">
            <div class="panel-header" style="padding:12px 18px;">
                <div class="panel-title">Sections</div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Display Name</th>
                                <th>Students</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($schoolClass->sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->display_name }}</td>
                                    <td>{{ $section->students_count }}</td>
                                    <td class="tbl-actions" style="white-space:nowrap;">
                                        <a href="{{ route('admin.classes.sections.edit', [$schoolClass, $section]) }}" class="tbl-act-btn tbl-edit" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No sections added yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header" style="padding:12px 18px;">
                <div class="panel-title">Students in {{ $schoolClass->name }}</div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classStudents as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->section?->display_name ?? '-' }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No students assigned to this class yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
