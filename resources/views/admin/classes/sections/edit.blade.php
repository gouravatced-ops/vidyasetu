@extends('admin.layouts.app')

@section('title', 'Edit Section - VidyaSetu')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <div>
                <div class="panel-title">Edit Section</div>
                <div class="page-breadcrumb" style="margin-top:6px; gap:6px; display:flex; flex-wrap:wrap; align-items:center; font-size:.85rem; color:var(--muted);">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.index') }}">Classes</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <a href="{{ route('admin.classes.show', $schoolClass) }}">{{ $schoolClass->name }}</a>
                    <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                    <span>Edit Section</span>
                </div>
            </div>
            <div class="panel-actions">
                <a href="{{ route('admin.classes.sections.index', $schoolClass) }}" class="btn-add"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="panel-body">
        <form action="{{ route('admin.classes.sections.update', [$schoolClass, $section]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row gy-3">
                <div class="col-12">
                    <label class="form-label">Class</label>
                    <input type="text" class="form-control" value="{{ $schoolClass->name }}" disabled>
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Section Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $section->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="display_name" class="form-label">Display Name</label>
                    <input type="text" name="display_name" id="display_name" value="{{ old('display_name', $section->display_name) }}" class="form-control @error('display_name') is-invalid @enderror">
                    @error('display_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update Section</button>
                    <a href="{{ route('admin.classes.show', $schoolClass) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
