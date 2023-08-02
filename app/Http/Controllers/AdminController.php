<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class AdminController extends Controller
{
    public function panelView(){
        $posts = Post::all();
        $users = User::all();

        return view('adminPanel', ['users' => $users, 'posts' => $posts]);
    }
}
