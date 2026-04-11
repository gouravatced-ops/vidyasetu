@extends('layouts.app')

@section('title', 'Teacher Dashboard - VidyaSetu')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-green-600 to-teal-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                <p class="text-green-100">Manage your classes and students effectively</p>
            </div>
            <div class="mt-4 lg:mt-0">
                <div class="text-right">
                    <p class="text-sm text-green-200">Last login</p>
                    <p class="text-lg font-semibold">{{ auth()->user()->last_login_at ? auth()->user()->last_login_at->format('d M Y, H:i') : 'First login' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Teacher Dashboard Content -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Teacher Dashboard</h2>
        <p class="text-gray-600">This is a placeholder for the teacher dashboard. Full functionality will be implemented soon.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-users text-2xl text-green-600 mb-2"></i>
                <h3 class="font-semibold">My Classes</h3>
                <p class="text-sm text-gray-600">Manage your class schedules</p>
            </div>
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-graduation-cap text-2xl text-green-600 mb-2"></i>
                <h3 class="font-semibold">Assignments</h3>
                <p class="text-sm text-gray-600">Create and grade assignments</p>
            </div>
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-calendar-check text-2xl text-green-600 mb-2"></i>
                <h3 class="font-semibold">Attendance</h3>
                <p class="text-sm text-gray-600">Mark student attendance</p>
            </div>
        </div>
    </div>
</div>
@endsection