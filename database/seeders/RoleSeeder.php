<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'super_admin',
                'display_name' => 'Super Administrator',
                'description' => 'Full system access with all permissions',
                'permissions' => [
                    'manage_users',
                    'manage_roles',
                    'manage_schools',
                    'manage_students',
                    'manage_teachers',
                    'manage_admissions',
                    'manage_fees',
                    'manage_reports',
                    'manage_settings',
                    'view_analytics',
                    'manage_system',
                ],
                'priority' => 100,
            ],
            [
                'name' => 'school_admin',
                'display_name' => 'School Administrator',
                'description' => 'School-level administrator with management permissions',
                'permissions' => [
                    'manage_students',
                    'manage_teachers',
                    'manage_admissions',
                    'manage_fees',
                    'manage_reports',
                    'view_analytics',
                    'manage_school_settings',
                ],
                'priority' => 80,
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Teacher',
                'description' => 'Teaching staff with student management permissions',
                'permissions' => [
                    'view_students',
                    'manage_student_grades',
                    'manage_attendance',
                    'view_reports',
                    'manage_class_content',
                ],
                'priority' => 60,
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
                'description' => 'Student with access to personal information and courses',
                'permissions' => [
                    'view_personal_info',
                    'view_grades',
                    'view_attendance',
                    'access_course_content',
                    'view_fee_details',
                ],
                'priority' => 40,
            ],
            [
                'name' => 'parent',
                'display_name' => 'Parent',
                'description' => 'Parent with access to child\'s information',
                'permissions' => [
                    'view_child_info',
                    'view_child_grades',
                    'view_child_attendance',
                    'view_child_fee_details',
                    'contact_teachers',
                ],
                'priority' => 30,
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Non-teaching staff with limited permissions',
                'permissions' => [
                    'view_assigned_tasks',
                    'manage_basic_records',
                    'view_reports',
                ],
                'priority' => 20,
            ],
        ];

        foreach ($roles as $roleData) {
            Role::updateOrCreate(
                ['name' => $roleData['name']],
                $roleData
            );
        }
    }
}