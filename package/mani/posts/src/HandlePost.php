<?php

namespace Mani\Posts;

use App\Models\Post;
use App\Models\Catagory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route; // Import the Route facade

class HandlePost
{
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

        return "Successfully created";
    }

    public function show($request)
    {
        $post = Post::where('id', $request->id)->firstOrFail();
        return $post;
    }
}
