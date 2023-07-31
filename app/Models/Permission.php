<?php

namespace App\Models;

use Laratrust\Models\Permission as PermissionModel;

class Permission extends PermissionModel
{
    public $guarded = [];


    public static function createPermission(array $data)
    {
        return self::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],
        ]);
    }
}
