<?php

namespace App\Repository;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mani\Users\HandleUser;
use Mockery\Exception;

class UserRepository
{

    public function create($request){
        $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users,username,NULL,id'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
        ]);
        $register = new HandleUser();
        $status = $register->register($request);
        if($status == true){
            return redirect()->route('posts')->with('success', 'User created successfully');
        }
        else{
            return abort(500);
        }
    }

    public function login($request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $login = new HandleUser();
        $login->login($request);
        }

        public function show(){
        $user = new HandleUser();
        $data = $user->show();
        $post = Post::all()->where('user_id', $data->id);
        return view('profile', ['user' => $data, 'post' => $post]);
        }

        public function index(){
            $users = User::all();

            return view('users', ['users' => $users]);
        }

        public function logout(){
            $connection = new HandleUser();
            $connection->logout();
        }


    }

