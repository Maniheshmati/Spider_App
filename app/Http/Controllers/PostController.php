<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
{
  $posts = Post::all();
  return view('posts.index', compact('posts'));
}

public function show(){
    $post = Post::where('id', request('id'))->first();
    if($post){
        return view('posts.post', ['post' => $post]);
    }
    else{
        return view('home');
    }

}

public function create()
{
  return view('posts.create');
}

public function store(Request $request)
{
  $request->validate([
    'title' => 'required',
    'body' => 'required',

]);
$user = Auth::user();

Post::create([
  'title' => $request->title,
  'body' => $request->body,
  'user_id' => $user->id,
  ]);
  return redirect('/posts');
}

public function edit($id)
{
  $post = Post::findOrFail($id);
  return view('posts.edit', compact('post'));
}

public function updateView(){
  return view('posts.update');
}

public function update(Request $request)
{
  $id = $request->route('id');
  if(Auth::user()->id == Post->user_id){
  $post = Post::findOrFail($id);
  $post->title = $request->input('title');
  $post->body = $request->input('body');
  $post->save();

  return redirect('/posts');
  }

}
public function deleteView(){
  return view('posts.delete');
}

public function delete(Request $request)
{
  $id = $request->input('id');
  $post = Post::findOrFail($id);

  $post->delete();

  return redirect('/posts');
}


public function modifyPostForm()
{
    return view('modify-post');
}

public function modifyPost(Request $request)
{
    $validatedData = $request->validate([
        'id' => 'required|numeric',
        'title' => 'required|string',
        'body' => 'required|string',
    ]);

    $postId = $validatedData['id'];
    $post = Post::find($postId);

    if (!$post) {
        return redirect()->back()->with('error', 'Post not found.');
    }

    $post->title = $validatedData['postTitle'];
    $post->body = $validatedData['postBody'];
    $post->save();

    return redirect()->back()->with('success', 'Post modified successfully.');
}

}


