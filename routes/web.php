<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/demo/request', function () {
    return view('demo');
})->name('demo');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('/forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('password.request');
    Route::post('/forget-password', [AuthController::class, 'handleForgetPassword'])->name('password.reset');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user', [AuthController::class, 'user'])->name('user.info');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/users', function () {
            return view('admin.dashboard');
        })->name('users.index');

        Route::get('/roles', function () {
            return view('admin.dashboard');
        })->name('roles.index');

        Route::get('/schools', function () {
            return view('admin.dashboard');
        })->name('schools.index');

        Route::get('/classes', [SchoolClassController::class, 'index'])->name('classes.index');
        Route::get('/classes/create', [SchoolClassController::class, 'create'])->name('classes.create');
        Route::post('/classes', [SchoolClassController::class, 'store'])->name('classes.store');
        Route::get('/classes/{schoolClass}', [SchoolClassController::class, 'show'])->name('classes.show');
        Route::get('/classes/{schoolClass}/edit', [SchoolClassController::class, 'edit'])->name('classes.edit');
        Route::put('/classes/{schoolClass}', [SchoolClassController::class, 'update'])->name('classes.update');
        Route::delete('/classes/{schoolClass}', [SchoolClassController::class, 'destroy'])->name('classes.destroy');
        Route::get('/classes/{schoolClass}/sections', [SchoolClassController::class, 'sectionsIndex'])->name('classes.sections.index');
        Route::get('/classes/{schoolClass}/sections/create', [SchoolClassController::class, 'createSection'])->name('classes.sections.create');
        Route::post('/classes/{schoolClass}/sections', [SchoolClassController::class, 'storeSection'])->name('classes.sections.store');
        Route::get('/classes/{schoolClass}/sections/{section}/edit', [SchoolClassController::class, 'editSection'])->name('classes.sections.edit');
        Route::put('/classes/{schoolClass}/sections/{section}', [SchoolClassController::class, 'updateSection'])->name('classes.sections.update');
        Route::delete('/classes/{schoolClass}/sections/{section}', [SchoolClassController::class, 'destroySection'])->name('classes.sections.destroy');
        Route::get('/classes/{schoolClass}/sections/{section}', [SchoolClassController::class, 'showSection'])->name('classes.sections.show');
        Route::post('/sections', [SchoolClassController::class, 'storeSectionGlobal'])->name('sections.store');
        Route::delete('/sections/{section}', [SchoolClassController::class, 'destroySectionGlobal'])->name('sections.destroy');
        Route::get('/sections', [SchoolClassController::class, 'sectionsAllIndex'])->name('sections.index');

        Route::get('/subjects', function () {
            return view('admin.dashboard');
        })->name('subjects.index');

        Route::get('/students', [StudentController::class, 'index'])->name('students.index');

        Route::get('/students/create', function () {
            return view('admin.dashboard');
        })->name('students.create');

        Route::get('/admissions', function () {
            return view('admin.dashboard');
        })->name('admissions.index');

        Route::get('/attendance', function () {
            return view('admin.dashboard');
        })->name('attendance.index');

        Route::get('/teachers', function () {
            return view('admin.dashboard');
        })->name('teachers.index');

        Route::get('/teachers/create', function () {
            return view('admin.dashboard');
        })->name('teachers.create');

        Route::get('/timetable', function () {
            return view('admin.dashboard');
        })->name('timetable.index');

        Route::get('/fees', function () {
            return view('admin.dashboard');
        })->name('fees.index');

        Route::get('/payments', function () {
            return view('admin.dashboard');
        })->name('payments.index');

        Route::get('/reports', function () {
            return view('admin.dashboard');
        })->name('reports.index');

        Route::get('/reports/financial', function () {
            return view('admin.dashboard');
        })->name('reports.financial');

        Route::get('/analytics', function () {
            return view('admin.dashboard');
        })->name('analytics.index');

        Route::get('/settings', function () {
            return view('admin.dashboard');
        })->name('settings.index');

        Route::get('/profile/edit', function () {
            return view('admin.dashboard');
        })->name('profile.edit');
    });

    // Parent Routes
    Route::middleware('role:parent')->prefix('parent')->name('parent.')->group(function () {
        Route::get('/dashboard', function () {
            return view('parent.dashboard');
        })->name('dashboard');

        Route::get('/children', function () {
            return view('parent.dashboard');
        })->name('children.index');

        Route::get('/children/add', function () {
            return view('parent.dashboard');
        })->name('children.add');

        Route::get('/grades', function () {
            return view('parent.dashboard');
        })->name('grades.index');

        Route::get('/progress', function () {
            return view('parent.dashboard');
        })->name('progress.index');

        Route::get('/exams', function () {
            return view('parent.dashboard');
        })->name('exams.index');

        Route::get('/attendance', function () {
            return view('parent.dashboard');
        })->name('attendance.index');

        Route::get('/fees', function () {
            return view('parent.dashboard');
        })->name('fees.index');

        Route::get('/fees/pay', function () {
            return view('parent.dashboard');
        })->name('fees.pay');

        Route::get('/payments', function () {
            return view('parent.dashboard');
        })->name('payments.index');

        Route::get('/messages', function () {
            return view('parent.dashboard');
        })->name('messages.index');

        Route::get('/announcements', function () {
            return view('parent.dashboard');
        })->name('announcements.index');

        Route::get('/teachers', function () {
            return view('parent.dashboard');
        })->name('teachers.index');

        Route::get('/timetable', function () {
            return view('parent.dashboard');
        })->name('timetable.index');

        Route::get('/profile', function () {
            return view('parent.dashboard');
        })->name('profile.index');

        Route::get('/settings', function () {
            return view('parent.dashboard');
        })->name('settings.index');

        Route::get('/support', function () {
            return view('parent.dashboard');
        })->name('support');

        Route::get('/faq', function () {
            return view('parent.dashboard');
        })->name('faq');
    });

    // Teacher Routes (placeholder)
    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/dashboard', function () {
            return view('teacher.dashboard');
        })->name('dashboard');
    });

    // Student Routes (placeholder)
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', function () {
            return view('student.dashboard');
        })->name('dashboard');
    });
});