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
use App\Repository\PostRepository;
use Mani\Posts\HandlePost;

class PostController extends Controller
{
  protected $postRepository;

  public function __construct(PostRepository $postRepository){
    $this->postRepository = $postRepository;
  }
    public function index()
{
  $posts = $this->postRepository->index();
  return view('posts.index', compact('posts'));
}

public function show(Request $request){
  $post = new HandlePost;
  $post_item = $post->show($request);

  return view('posts.post', ['post' => $post_item]);

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

        $handlePost = new HandlePost();
        $response = $handlePost->create($request);
        if($response == 'Successfully created'){
          return redirect('/posts');
        }
        else{
          return redirect('/posts/create');
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
  $this->postRepository->update($request);
    return redirect('/posts');
}
public function deleteView(){
  return view('posts.delete');
}

public function delete(Request $request)
{
  $this->postRepository->delete($request);

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


