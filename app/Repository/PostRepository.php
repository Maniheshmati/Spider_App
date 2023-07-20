<?php

namespace App\Repository;
use App\Models\Post;
use App\Models\Catagory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostRepository{
    public function show(){
        try{
            $post = Post::where('id', request('id'))->firstOrFail();
            return $post;
          }
          catch(\Exception $exception){
            return abort(404);
        }
    }
    public function index(){
        try{
            $post = Post::all();
            return $post;
        }
        catch(\Exception $exception){
            return abort(404);
        }
    }
    public function store($request){
        $request->validate([
            'title' => 'bail|required|max:70',
            'body' => 'required',
            'category' => ['required', 'integer', ' exists:catagories,id'],
          ]);
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
