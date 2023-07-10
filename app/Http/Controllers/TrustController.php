<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrustController extends Controller
{
    public function permissionView()
    {
        $users = User::all();
        $permissions = Permission::all();
        $roles = Role::all();

        return view('permission', ['users' => $users, 'permissions' => $permissions, 'roles' => $roles]);
    }


    public function permission(Request $request)
    {

        $permissions = $request->permission ?? [];
        $user = User::find($request->user);

        if ($request->permission && !$user->hasPermission($permissions)) {
                $user->givePermissions($permissions);
            }

        return redirect()->route('users');

    }




    public function roleView(){
        $roles = Role::all();
        $users = User::all();

        return view('roles', ['roles' => $roles, 'users' => $users]);
    }
    public function role(Request $request){
        $role = $request->role;
        $user = User::find($request->user);
        if($request->role && !$user->hasRole($role)){
            $user->addRole($role);

        }
    }


}
