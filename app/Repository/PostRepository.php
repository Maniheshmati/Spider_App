<?php

namespace App\Repository;
use App\Models\Post;
use App\Models\Catagory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mani\Posts;
use Mani\Posts\HandlePost;

class PostRepository{
    public function show($request){

    }
    public function index(){

            $post = Post::all();
            return $post;
        
    }
    public function store($request){

    }

    public function update($request)
    {
        $post = Post::findOrFail($request->id)->update($request->all());
        return $post;
    }

    public function delete($request){
        $id = $request->input('id');
        $post = Post::findOrFail($id)->delete();
      return $post;
    }

}
