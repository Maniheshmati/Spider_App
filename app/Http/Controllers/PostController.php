<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mani\Posts\HandlePost;

class PostController extends Controller
{
  protected $post;

  public function __construct(HandlePost $post){
    $this->post = $post;
  }

public function show(Request $request){
  $post = $this->post->show($request);
  $comments = Comment::where('post_id', $request->id)->orderBy('created_at', 'desc')->get();
  return view('posts.post', ['post' => $post, 'comments' => $comments]);

}

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
            'category' => ['required', 'integer', 'exists:catagories,id'],
        ]);

        $response = $this->post->create($request);
        if($response == true){
          return redirect()->route('posts');
        }
        else{
          return redirect()->route('posts.create');
        }


    }

public function edit($id)
{
  $post = Post::findOrFail($id);
  return view('posts.edit', compact('post'));
}

public function updateView(){
  return view('posts.update');
}
public function update(Request $request){
  $this->post->update($request);
    return redirect('/posts');
}
public function deleteView(){
  return view('posts.delete');
}

public function delete(Request $request)
{
  $this->post->delete($request);

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


