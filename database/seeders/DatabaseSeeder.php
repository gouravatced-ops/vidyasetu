<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        $this->call(RoleSeeder::class);

        // Seed schools before users so we can assign tenants
        $this->call(SchoolSeeder::class);

        // Seed users with school assignments
        $this->call(UserSeeder::class);

        // Additional seeders can be added here
        // $this->call(OtherSeeder::class);
    }
}
