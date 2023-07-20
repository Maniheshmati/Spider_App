<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class UserRepository
{

    public function create($request){
        try {
            $request->validate([
                'name' => 'required',
                'username' => ['required', 'unique:users,username,NULL,id'],
                'email' => ['required', 'unique:users', 'email'],
                'password' => ['required', 'min:8'],
            ]);
            $user = User::create($request->validated());
            auth()->login($user);
            return redirect('posts')->withSuccess('You have registered');
        }catch (Exception $exception){
            return abort(400);
        }

    }

    public function login($request){
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

        public function show(){
            // Find the user by username in the database
            $user = User::where('username', request('username'))->first();

            // If the user is not found, redirect to a 404 page
            if ($user) {
                return view('profile', ['user' => $user, 'posts' => "App\Models\Post"]);
            } else {
                return view('404');
            }
        }

        public function index(){
            $users = User::all();

            return view('users', ['users' => $users]);
        }

        public function logout(){
            $user = Auth::user();
            Auth::logout();
        }


    }

