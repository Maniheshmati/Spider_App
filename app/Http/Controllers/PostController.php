<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use App\Models\Post;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exceptions\PostNotFound;

class PostController extends Controller
{
    public function index()
{
  $posts = Post::all();
  return view('posts.index', compact('posts'));
}

public function show(){
  try{
    $post = Post::where('id', request('id'))->firstOrFail();
    return view('posts.post', ['post' => $post]);
  }
  catch(\Exception $exception){
    return abort(404);
}}

public function create()
{
    $categories = Catagory::all();
  return view('posts.create', ['categories' => $categories]);
}

public function store(Request $request)
{
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
//
//public function update(Request $request)
//{
//  $id = $request->route('id');
//  if(Auth::user()->id == Post->user_id){
//  $post = Post::findOrFail($id);
//  $post->title = $request->input('title');
//  $post->body = $request->input('body');
//  $post->save();
//
//  return redirect('/posts');
//  }

//}
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


    public function exportToExcel(){
       return Excel::download(new PostExport, 'posts.xlsx');

    }
}


