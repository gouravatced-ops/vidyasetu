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
            <table class="table table-hover table-striped align-middle">
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
                            <td><span class="badge bg-success">Active</span></td>
                            <td>{{ $class->sections_count }}</td>
                            <td>{{ $class->students_count }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('admin.classes.show', $class) }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.classes.edit', $class) }}" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger btn-delete-class" title="Remove" data-action="{{ route('admin.classes.destroy', $class) }}" data-class-name="{{ $class->name }}">
                                    <i class="fas fa-trash"></i>
                                </button>
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

    <div class="modal fade" id="classDeleteModal" tabindex="-1" aria-labelledby="classDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classDeleteModalLabel">Remove Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="classDeleteModalMessage">Do you want to remove this class and deactivate all its sections?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form id="classDeleteForm" action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var deleteModalEl = document.getElementById('classDeleteModal');
                if (!deleteModalEl) {
                    return;
                }

                var deleteModal = new bootstrap.Modal(deleteModalEl);
                var deleteForm = document.getElementById('classDeleteForm');
                var deleteMessage = document.getElementById('classDeleteModalMessage');

                document.querySelectorAll('.btn-delete-class').forEach(function (button) {
                    button.addEventListener('click', function () {
                        deleteForm.action = this.dataset.action;
                        deleteMessage.textContent = 'Do you want to remove class "' + this.dataset.className + '" and deactivate all its sections?';
                        deleteModal.show();
                    });
                });
            });
        </script>
    @endpush
@endsection
