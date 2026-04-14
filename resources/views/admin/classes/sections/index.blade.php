@extends('admin.layouts.app')

@section('title', 'Section List - VidyaSetu')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">{{ $schoolClass->name }} Sections</div>
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.index') }}">Classes</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <span>Sections</span>
                </div>
            </div>
            <div class="panel-actions">
                <a href="{{ route('admin.classes.show', $schoolClass) }}" class="btn-add"><i class="fas fa-arrow-left"></i> Back</a>
                <a href="{{ route('admin.classes.sections.create', $schoolClass) }}" class="btn-add"><i class="fas fa-plus"></i> Add Section</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Display Name</th>
                                <th>Students</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->display_name }}</td>
                                    <td>{{ $section->students_count }}</td>
                                    <td>
                                        <a href="{{ route('admin.classes.sections.show', [$schoolClass, $section]) }}" class="btn btn-sm btn-outline-primary">Students</a>
                                        <a href="{{ route('admin.classes.sections.edit', [$schoolClass, $section]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No sections found for this class.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
