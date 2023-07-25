<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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
        Role::insert($roles);
    }
}
