@extends('admin.layouts.app')

@section('title', 'Add Section - VidyaSetu')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">Add Section</div>
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.index') }}">Classes</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.show', $schoolClass) }}">{{ $schoolClass->name }}</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <span>Add Section</span>
                </div>
            </div>
            <div class="panel-actions">
                <a href="{{ route('admin.classes.sections.index', $schoolClass) }}" class="btn-add"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="card rounded-4 border-0 card-modern-form">
                <div class="card-body p-4">
                    <form action="{{ route('admin.classes.sections.store', $schoolClass) }}" method="POST" class="class-create-form form-modern-grid">
                        @csrf
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <div class="col-12">
                                <label class="form-label-modern">Class</label>
                                <input type="text" class="form-control-modern" value="{{ $schoolClass->name }}" disabled>
                            </div>

                            <div>
                                <label for="name" class="form-label-modern">Section Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control-modern @error('name') is-invalid @enderror" placeholder="A, B, C" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div>
                                <label for="display_name" class="form-label-modern">Display Name</label>
                                <input type="text" name="display_name" id="display_name" value="{{ old('display_name') }}" class="form-control-modern @error('display_name') is-invalid @enderror" placeholder="Leave blank to auto-generate">
                                @error('display_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 form-create-actions">
                                <a href="{{ route('admin.classes.show', $schoolClass) }}" class="btn-outline-modern">Cancel</a>
                                <button type="submit" class="btn-primary-modern"><i class="fas fa-save me-2"></i>Save Section</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
