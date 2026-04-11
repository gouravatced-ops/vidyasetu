@extends('layouts.app')

@section('title', 'Student Dashboard - VidyaSetu')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-orange-600 to-red-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}!</h1>
                <p class="text-orange-100">Continue your learning journey</p>
            </div>
            <div class="mt-4 lg:mt-0">
                <div class="text-right">
                    <p class="text-sm text-orange-200">Last login</p>
                    <p class="text-lg font-semibold">{{ auth()->user()->last_login_at ? auth()->user()->last_login_at->format('d M Y, H:i') : 'First login' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Dashboard Content -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Student Dashboard</h2>
        <p class="text-gray-600">This is a placeholder for the student dashboard. Full functionality will be implemented soon.</p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-book text-2xl text-orange-600 mb-2"></i>
                <h3 class="font-semibold">My Courses</h3>
                <p class="text-sm text-gray-600">Access your study materials</p>
            </div>
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-tasks text-2xl text-orange-600 mb-2"></i>
                <h3 class="font-semibold">Assignments</h3>
                <p class="text-sm text-gray-600">View and submit assignments</p>
            </div>
            <div class="p-4 border border-gray-200 rounded-lg text-center">
                <i class="fas fa-chart-line text-2xl text-orange-600 mb-2"></i>
                <h3 class="font-semibold">Grades</h3>
                <p class="text-sm text-gray-600">Check your performance</p>
            </div>
        </div>
    </div>
</div>
@endsection