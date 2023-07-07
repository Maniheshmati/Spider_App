<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class SearchController extends Controller
{
    public function search(Request $request, PostController $postController, UserController $userController)
{
    $posts = Post::where('title', 'like', '%' . $request->search . '%')->orWhere('body', 'like', '%' . $request->search . '%')->get();
    $users = User::where('name', 'like', '%' . $request->search . '%')->get();

    return view('posts.search', ['posts' => $posts, 'users' => $users]);
}
}
