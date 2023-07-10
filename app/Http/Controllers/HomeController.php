<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexView()
    {
        $user = Auth::user();
        $permissions = $user->permissions;

        $role = $user->roles->first->name;
        return view('home', ['permissions' => $permissions, 'role' => $role]);
    }
    public function index(Request $request){
        if($request){
            Auth::logout();
            return view('posts.posts');
        }
    }
}
