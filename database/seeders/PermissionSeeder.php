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
        Permission::createPermission([
            'name' => 'create-post',
            'display_name' => 'Create Post',
            'description' => "Create a Post",
        ]);
        Permission::createPermission([
            'name' => 'delete-post',
            'display_name' => 'Delete Post',
            'description' => 'Delete existing posts',
        ]);

        Permission::createPermission([
            'name' => 'edit-user',
            'display_name' => 'Edit User',
            'description' => 'Edit existing users',
        ]);

        Permission::createPermission([
            'name' => 'create-user',
            'display_name' => 'Create user',
            'description' => "Create a User",
        ]);
        Permission::createPermission([
            'name' => 'delete-user',
            'display_name' => 'Delete User',
            'description' => 'Delete existing Users',
        ]);
        Permission::createPermission([
            'name' => 'update-user',
            'display_name' => 'Update User',
            'description' => 'Update existing Users',
        ]);


    }
}
