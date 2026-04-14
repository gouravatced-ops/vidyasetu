<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::updateOrCreate(
            ['name' => 'DAV Public School, Patna'],
            [
                'code' => 'DAVPAT',
                'address' => '5 MG Road, Patna',
                'city' => 'Patna',
                'state' => 'Bihar',
                'country' => 'India',
                'phone' => '+911234567890',
                'email' => 'info@davpatna.edu.in',
            ]
        );

        School::updateOrCreate(
            ['name' => 'Green Valley International School'],
            [
                'code' => 'GVIS',
                'address' => '12 School Lane, Ranchi',
                'city' => 'Ranchi',
                'state' => 'Jharkhand',
                'country' => 'India',
                'phone' => '+919876543000',
                'email' => 'contact@gvischool.in',
            ]
        );
    }
}
