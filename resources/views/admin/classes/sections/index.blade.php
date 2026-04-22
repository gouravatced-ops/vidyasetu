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
                <a href="{{ route('admin.classes.show', $schoolClass) }}" class="btn btn-outline-secondary" style="border-radius:6px; padding:8px 16px;"><i class="fas fa-arrow-left"></i> Back</a>
                <a href="{{ route('admin.classes.sections.create', $schoolClass) }}" class="btn btn-primary" style="border-radius:6px; padding:8px 16px;"><i class="fas fa-plus"></i> Add Section</a>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
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
                        @forelse($sections as $section)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->display_name }}</td>
                                <td>{{ $section->students_count }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.classes.sections.edit', [$schoolClass, $section]) }}" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete-section" title="Remove" data-action="{{ route('admin.classes.sections.destroy', [$schoolClass, $section]) }}" data-section-name="{{ $section->display_name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No sections found for this class.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sectionDeleteModal" tabindex="-1" aria-labelledby="sectionDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sectionDeleteModalLabel">Remove Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="sectionDeleteModalMessage">Do you want to remove this section from the class?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form id="sectionDeleteForm" action="#" method="POST" class="d-inline">
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
                var deleteModalEl = document.getElementById('sectionDeleteModal');
                if (!deleteModalEl) {
                    return;
                }

                var deleteModal = new bootstrap.Modal(deleteModalEl);
                var deleteForm = document.getElementById('sectionDeleteForm');
                var deleteMessage = document.getElementById('sectionDeleteModalMessage');

                document.querySelectorAll('.btn-delete-section').forEach(function (button) {
                    button.addEventListener('click', function () {
                        deleteForm.action = this.dataset.action;
                        deleteMessage.textContent = 'Do you want to remove section "' + this.dataset.sectionName + '" from this class?';
                        deleteModal.show();
                    });
                });
            });
        </script>
    @endpush
@endsection
