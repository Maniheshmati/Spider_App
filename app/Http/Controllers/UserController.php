<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
         $user = User::where('username', $request->username)->first();
         if($user){
             if(password_verify($request->password, $user->password)){
                 $request->session()->put('user', $user);
                 return redirect('posts');
             }
         }
         else{
             $request->session()->flash('error', 'Invalid username or password');
            return redirect('users/login');
         }
        }}
