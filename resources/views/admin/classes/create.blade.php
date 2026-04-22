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
        <div class="card rounded-4 border-0 card-modern-form">
            <div class="card-body p-4">
                <form action="{{ route('admin.classes.store') }}" method="POST" class="class-create-form form-modern-grid">
                    @csrf
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @if(!auth()->user()->school_id && $schools->isNotEmpty())
                            <div>
                                <label for="school_id" class="form-label-modern">School</label>
                                <select name="school_id" id="school_id" class="form-select-modern @error('school_id') is-invalid @enderror">
                                    <option value="">Select school</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                                    @endforeach
                                </select>
                                @error('school_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        @endif

                        <div>
                            <label for="number" class="form-label-modern">Class Number</label>
                            <input type="text" name="number" id="number" value="{{ old('number') }}" class="form-control-modern @error('number') is-invalid @enderror" placeholder="0, Nursery, KG1" required>
                            @error('number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="display_number" class="form-label-modern">Display Number</label>
                            <input type="text" name="display_number" id="display_number" value="{{ old('display_number') }}" class="form-control-modern @error('display_number') is-invalid @enderror" placeholder="NUR or I, II, III">
                            @error('display_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="name" class="form-label-modern">Class Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control-modern @error('name') is-invalid @enderror" placeholder="Nursery, Class 1, Grade 2">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label-modern">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control-modern @error('description') is-invalid @enderror" placeholder="Optional description">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 text-end form-create-actions">
                            <button type="submit" class="btn-primary-modern"><i class="fas fa-save me-2"></i>Save Class</button>
                            <a href="{{ route('admin.classes.index') }}" class="btn-outline-modern">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection