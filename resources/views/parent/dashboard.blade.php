@extends('parent.layouts.app')

@section('title', 'Parent Dashboard - VidyaSetu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded shadow-sm p-4 mb-6">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h1 class="h3 mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                        <p class="text-muted mb-0">Your parent portal dashboard provides attendance, grades, and school updates.</p>
                    </div>
                    <div class="text-end">
                        <p class="mb-1 text-muted">Last login</p>
                        <p class="mb-0 fw-semibold">{{ auth()->user()->last_login_at ? auth()->user()->last_login_at->format('d M Y, H:i') : 'First login' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Children</h5>
                    <p class="card-text text-muted">View your child(ren)'s profile and academic details.</p>
                    <a href="{{ route('parent.children.index') }}" class="btn btn-primary btn-sm">View children</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Attendance</h5>
                    <p class="card-text text-muted">Check daily attendance and recent trends.</p>
                    <a href="{{ route('parent.attendance.index') }}" class="btn btn-primary btn-sm">View attendance</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Messages</h5>
                    <p class="card-text text-muted">Open messages from teachers and school administration.</p>
                    <a href="{{ route('parent.messages.index') }}" class="btn btn-primary btn-sm">View messages</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
