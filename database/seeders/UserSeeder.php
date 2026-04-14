<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get roles
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $schoolAdminRole = Role::where('name', 'school_admin')->first();
        $teacherRole = Role::where('name', 'teacher')->first();
        $studentRole = Role::where('name', 'student')->first();
        $parentRole = Role::where('name', 'parent')->first();

        // Get schools
        $schoolA = School::firstWhere('code', 'DAVPAT') ?? School::first();
        $schoolB = School::firstWhere('code', 'GVIS') ?? $schoolA;

        // Create Super Admin
        User::updateOrCreate(
            ['email' => 'admin@vidyasetu.com'],
            [
                'name' => 'Super Administrator',
                'email' => 'admin@vidyasetu.com',
                'phone' => '+919876543210',
                'password' => Hash::make('password'),
                'password_changed_at' => now(),
                'role_id' => $superAdminRole->id,
                'school_id' => $schoolA?->id,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
                'preferences' => [
                    'theme' => 'light',
                    'language' => 'en',
                    'notifications' => [
                        'email' => true,
                        'sms' => true,
                        'push' => true,
                    ],
                ],
            ]
        );

        // Create School Admin
        User::updateOrCreate(
            ['email' => 'schooladmin@vidyasetu.com'],
            [
                'name' => 'School Administrator',
                'email' => 'schooladmin@vidyasetu.com',
                'phone' => '+919876543211',
                'password' => Hash::make('password'),
                'password_changed_at' => now(),
                'role_id' => $schoolAdminRole->id,
                'school_id' => $schoolA?->id,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ]
        );

        // Create Teacher
        User::updateOrCreate(
            ['email' => 'teacher@vidyasetu.com'],
            [
                'name' => 'John Smith',
                'email' => 'teacher@vidyasetu.com',
                'phone' => '+919876543212',
                'password' => Hash::make('password'),
                'password_changed_at' => now(),
                'role_id' => $teacherRole->id,
                'school_id' => $schoolA?->id,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ]
        );

        // Create Student
        User::updateOrCreate(
            ['email' => 'student@vidyasetu.com'],
            [
                'name' => 'Alice Johnson',
                'email' => 'student@vidyasetu.com',
                'phone' => '+919876543213',
                'password' => Hash::make('password'),
                'password_changed_at' => now(),
                'role_id' => $studentRole->id,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ]
        );

        // Create Parent
        User::updateOrCreate(
            ['email' => 'parent@vidyasetu.com'],
            [
                'name' => 'Bob Johnson',
                'email' => 'parent@vidyasetu.com',
                'phone' => '+919876543214',
                'password' => Hash::make('password'),
                'password_changed_at' => now(),
                'role_id' => $parentRole->id,
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'is_active' => true,
            ]
        );

        // Create additional test users
        User::factory(10)->create([
            'role_id' => $studentRole->id,
            'password_changed_at' => now(),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'is_active' => true,
        ]);
    }
}