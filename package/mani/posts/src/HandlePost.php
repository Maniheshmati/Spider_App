<?php

namespace Mani\Posts;

use App\Models\Post;
use App\Models\Catagory;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route; // Import the Route facade

class HandlePost
{
    public function index(){
            $post = Post::all();
            return $post;
    }
    public function create($request)
    {
        $user = Auth::user();
        $category = Catagory::find($request->category);

        if (!$category) {
            return redirect()->back()->with('error', 'Invalid category selected.');
        }

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        return true;
    }
    public function delete($request){
        $post = Post::findOrFail($request->id)->delete();
      return $post;
    }

    public function update($request){
        $post = Post::findOrFail($request->id)->update($request->all());
        return $post;
    }

    public function show($request)
    {
        $post = Post::where('id', $request->id)->firstOrFail();
        return $post;
    }
    public function getComments($request){
        $comments = Comment::where('post_id', $request->id)->orderBy('created_at', 'desc')->get();
        return $comments;
    }
}
