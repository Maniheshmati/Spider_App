<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'owner',
            'display_name' => 'Owner',
            'description' => 'Owner User',
        ]);
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Admin User'
        ]);
    }
}
