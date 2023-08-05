<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class SearchController extends Controller
{
    public function search(Request $request)
{
    $users = User::search($request->search)->get();
    $posts = Post::search($request->search)->get();
    return view('posts.search', ['users' => $users, 'posts' => $posts]);
}
}