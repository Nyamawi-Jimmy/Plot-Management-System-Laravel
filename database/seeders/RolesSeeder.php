<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role' => 'Admin'],
            ['role' => 'Moderator'],
            ['role' => 'User'],
            // Add more roles if needed
        ];

        // Insert the roles into the database
        Roles::insert($roles);
    }
}
