<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
{
  $posts = Post::all();
  return view('posts.index', compact('posts'));
}

// public function show($id)
// {
//   $post = Post::findOrFail($id);
//   return view('posts.show', compact('post'));
// }

public function create()
{
  return view('posts.create');
}

public function store(Request $request)
{
  $post = new Post;
  $post->title = $request->input('title');
  $post->body = $request->input('body');
  $post->save();

  return redirect()->route('posts.index');
}

public function edit($id)
{
  $post = Post::findOrFail($id);
  return view('posts.edit', compact('post'));
}

public function update(Request $request, $id)
{
  $post = Post::findOrFail($id);
  $post->title = $request->input('title');
  $post->body = $request->input('body');
  $post->save();

  return redirect()->route('posts.index');
}

public function delete($id)
{
  $post = Post::findOrFail($id);
  $post->delete();

  return redirect()->route('posts.index');
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