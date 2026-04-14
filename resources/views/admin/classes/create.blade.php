@extends('admin.layouts.app')

@section('title', 'Add Class - VidyaSetu')

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <div class="panel-title">Add New Class</div>
            <div class="page-breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Home</a>
                <i class="fas fa-angle-right" style="font-size:.7rem;"></i>
                <span>Add New Class</span>
            </div>
        </div>
        <div class="panel-actions">
            <a href="{{ route('admin.classes.index') }}" class="btn-add"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('admin.classes.store') }}" method="POST">
            @csrf
            <div class="row gy-3">
                @if(!auth()->user()->school_id && $schools->isNotEmpty())
                    <div class="col-12">
                        <label for="school_id" class="form-label">School</label>
                        <select name="school_id" id="school_id" class="form-select @error('school_id') is-invalid @enderror">
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                @endif

                <div class="col-md-6">
                    <label for="number" class="form-label">Class Number</label>
                    <input type="text" name="number" id="number" value="{{ old('number') }}" class="form-control @error('number') is-invalid @enderror" required>
                    <div class="form-text">Use 0 or Nursery for Nursery, or custom text like KG1.</div>
                    @error('number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="display_number" class="form-label">Display Number</label>
                    <input type="text" name="display_number" id="display_number" value="{{ old('display_number') }}" class="form-control @error('display_number') is-invalid @enderror" placeholder="NUR or I, II, III...">
                    <div class="form-text">Leave blank to auto-generate Roman or NUR for Nursery.</div>
                    @error('display_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nursery, Class 1, Grade 2">
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-12 d-flex gap-2 justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Save Class</button>
                    <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection