@extends('admin.layouts.app')

@section('title', 'Section Students - VidyaSetu')

@section('content')
    <div class="panel container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h4 mb-2">{{ $section->display_name }} Students</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}">Classes</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.classes.show', $schoolClass) }}">{{ $schoolClass->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $section->display_name }}</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.classes.sections.index', $schoolClass) }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sectionStudents as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $schoolClass->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No students assigned to this section yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
