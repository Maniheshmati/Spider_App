<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    
    public function store(Request $request){
        Comment::create([
            'body' => $request->body,
            'post_id' => $request->id,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/post/' . $request->id);
    }
}
