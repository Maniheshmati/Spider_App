<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function createView() {
        return view("register");
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users,username,NULL,id'],
            'email' => ['required', 'unique:users'],
            'password' => 'required',
        ]);
        
        # Write an if to check if username does not exist
        if(User::where('username', $request->username)->exists()){
            $request->session()->flash('error', 'Username already exists');
            
            return redirect('users/register');
        }
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

    }

    public function loginView(){
        return view("login");
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('posts')->withSuccess('You have logged in');
        }
        return redirect('login')->withSuccess('Invalid credentials');
        
        }
    }

