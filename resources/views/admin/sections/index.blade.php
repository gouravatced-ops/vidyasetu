@extends('admin.layouts.app')

@section('title', 'Sections - VidyaSetu')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">Section List</div>
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <span>Sections</span>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Section</th>
                            <th>Display Name</th>
                            <th>Class</th>
                            <th>Students</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sections as $section)
                            <tr>
                                <td>{{ $sections->firstItem() + $loop->index }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->display_name }}</td>
                                <td>{{ $section->schoolClass?->name ?? '-' }}</td>
                                <td>{{ $section->students_count }}</td>
                                <td class="tbl-actions" style="white-space:nowrap;">
                                    <a href="{{ route('admin.classes.sections.edit', [$section->schoolClass, $section]) }}" class="tbl-act-btn tbl-edit" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No sections found yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($sections->hasPages())
                <div class="d-flex justify-content-end mt-3">
                    {{ $sections->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection