<?php
# Comments controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    
    public function store(Request $request){
        if($request->checkBox == true){
            
            $post = new Post();


                $post->where('id', $request->id)->update([
                     'is_done' => 1
                ]);
                $post->save;
            }
        else{
                        
            $post = new Post();


                $post->where('id', $request->id)->update([
                     'is_done' => 0
                ]);
                $post->save;
        }

        if($request->body != null){
            Comment::create([
                'body' => $request->body,
                'post_id' => $request->id,
                'user_id' => auth()->user()->id
            ]);
            return redirect('/post/' . $request->id);
        }

        }
    }

