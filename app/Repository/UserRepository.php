<?php

namespace App\Repository;

use App\Models\Comment;
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
        $response = $register->register($request);
        if($response == "Successfully login"){
            return redirect('/home');
        }
        else{
            return redirect('/users/register');
        }

        }
    

    public function login($request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $login = new HandleUser();
        $response = $login->login($request);
        if($response == "Successfully login"){
            return redirect('/home');
        }
        else{
            return redirect('/users/login');
        }
        }

        public function show(){

        }

        public function index(){
            $users = User::all();

            return view('users', ['users' => $users]);
        }

        public function logout(){
            $connection = new HandleUser();
            $connection->logout();
        }

        public function delete($id){
            Auth::logout();

            $comments = Comment::where('user_id', $id)->delete();

            $posts = Post::where('user_id', $id)->delete();

            $user = User::find($id)->delete();
            
            return true;

        }
    }

