<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate([
            'name' => 'create-post',
            'display_name' => 'Create Post',
            'description' => "Create a Post",
        ]);
        Permission::updateOrCreate([
            'name' => 'delete-post',
            'display_name' => 'Delete Post',
            'description' => 'Delete existing posts',
        ]);
        Permission::updateOrCreate([
            'name' => 'update-post',
            'display_name' => 'Update Post',
            'description' => 'Update existing posts',
        ]);
        $this->call(PermissionSeeder::class);
        Permission::updateOrCreate([
            'name' => 'edit-user',
            'display_name' => 'Edit User',
            'description' => 'Edit existing users',
        ]);
        $this->call(PermissionSeeder::class);
                Permission::updateOrCreate([
            'name' => 'create-user',
            'display_name' => 'Create user',
            'description' => "Create a User",
        ]);
        Permission::updateOrCreate([
            'name' => 'delete-user',
            'display_name' => 'Delete User',
            'description' => 'Delete existing Users',
        ]);
        Permission::updateOrCreate([
            'name' => 'update-user',
            'display_name' => 'Update User',
            'description' => 'Update existing Users',
        ]);


    }
}
