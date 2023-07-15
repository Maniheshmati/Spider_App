<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{
    public function createView()
    {
        return view("register");
    }

    public function create(RegisterRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users,username,NULL,id'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create($request->validated());
        auth()->login($user);

        return redirect('posts')->withSuccess('You have registered');
    }

    public function loginView()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('posts')->withSuccess('You have logged in');
        }

        return redirect('login')->withSuccess('Invalid credentials');
    }

    public function show()
    {
        // Find the user by username in the database
        $user = User::where('username', request('username'))->first();

        // If the user is not found, redirect to a 404 page
        if ($user) {
            return view('profile', ['user' => $user, 'posts' => "App\Models\Post"]);
        } else {
            return view('404');
        }
    }

    public function index()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }
    public function logout(){
        $user = Auth::user();
        Auth::logout();
    }

}
