@extends('admin.layouts.app')

@section('title', 'Manage Classes - VidyaSetu')

@section('content')
    <x-admin-table-toolbar
        title="Manage Classes"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => route('admin.dashboard')],
            ['label' => 'Classes'],
        ]"
        :search="request('search')"
        searchPlaceholder="Search classes, numbers, school..."
        :column="request('column')"
        :columns="[
            'number' => 'Class Number',
            'display_number' => 'Display Number',
            'name' => 'Class Name',
            'school' => 'School',
        ]"
        :createUrl="route('admin.classes.create')"
        createText="Add Class"
    >
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                                <th>Class Number</th>
                        <th>Display Number</th>
                        <th>Class Name</th>
                        <th>Sections</th>
                        <th>Students</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classes as $class)
                        <tr>
                            <td>{{ $classes->firstItem() + $loop->index }}</td>
                            <td>{{ $class->number }}</td>
                            <td>{{ $class->display_number }}</td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->sections_count }}</td>
                            <td>{{ $class->students_count }}</td>
                            <td class="tbl-actions" style="white-space:nowrap;">
                                <a href="{{ route('admin.classes.show', $class) }}" class="tbl-act-btn tbl-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.classes.edit', $class) }}" class="tbl-act-btn tbl-edit" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No classes found. Add a class to begin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($classes->hasPages())
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mt-3">
                <div class="text-muted" style="font-size:.88rem;">
                    Showing {{ $classes->firstItem() ?? 0 }} to {{ $classes->lastItem() ?? 0 }} of {{ $classes->total() }} classes
                </div>
                <div>
                    {{ $classes->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </x-admin-table-toolbar>
@endsection
