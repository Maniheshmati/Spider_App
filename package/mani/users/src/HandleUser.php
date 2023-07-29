<?php

namespace Mani\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class HandleUser
{
    public function register($request){

        
        $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
        ]);

        auth()->login($user);
        if(Auth::check()){
            return "Successfully created";
        }
        else{
            return "Error";
        }
}
    public function login($request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return "Successfully login";
        }

        return "error";
    }
    public function show(){
        // Find the user by username in the database
        $user = User::where('username', request('username'))->first();

        // If the user is not found, redirect to a 404 page
        if ($user) {

            return $user;
        } else {
            return view('404');
        }
    }
    public function logout(){
        $user = Auth::user();
        Auth::logout();
    }
}