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
            <div class="panel-actions">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sectionCreateModal"><i class="fas fa-plus"></i> Add Section</button>
            </div>
        </div>
        <div class="panel-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Section</th>
                            <th>Display Name</th>
                            <th>Class</th>
                            <th>Students</th>
                            <th>Status</th>
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
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.classes.sections.edit', [$section->schoolClass, $section]) }}" class="btn btn-sm btn-outline-success me-1" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete-section" title="Remove" data-action="{{ route('admin.sections.destroy', $section) }}" data-section-name="{{ $section->display_name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
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

    <div class="modal fade" id="sectionCreateModal" tabindex="-1" aria-labelledby="sectionCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header modal-header-modern">
                    <h5 class="modal-title" id="sectionCreateModalLabel">Create Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.sections.store') }}" method="POST">
                    @csrf
                    <div class="modal-body pt-0">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="school_class_id" class="form-label-modern">Select Class</label>
                                <select id="school_class_id" name="school_class_id" class="form-select-modern @error('school_class_id') is-invalid @enderror" required>
                                    <option value="">Choose class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('school_class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }} ({{ $class->display_number }})</option>
                                    @endforeach
                                </select>
                                @error('school_class_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label-modern">Section Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control-modern @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="display_name" class="form-label-modern">Display Name</label>
                                <input type="text" id="display_name" name="display_name" value="{{ old('display_name') }}" class="form-control-modern @error('display_name') is-invalid @enderror">
                                @error('display_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn-outline-modern" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-primary-modern">Add Section</button>
                    </div>
                </form>
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
                    <p id="sectionDeleteModalMessage">Do you want to remove this section?</p>
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
                        deleteMessage.textContent = 'Do you want to remove section "' + this.dataset.sectionName + '"?';
                        deleteModal.show();
                    });
                });
            });
        </script>
    @endpush
@endsection