@include('layouts.header')
@inject('posts', 'App\Models\Post')


<div class="container">
  <a href="insertPost"><button class="btn btn-primary">Create Post</button></a>
  <a href="updatePost"><button class="btn btn-primary">Update Post</button></a>
  <a href="deletePost"><button class="btn btn-primary">Delete Post</button></a>  
  <br>
    <h1>Posts</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Text</th>
          <th>Release Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach (\App\Models\Post::where('title', 'LIKE', '%' . $_GET['search'] . '%')->get() as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->body}}</td>
          <td>{{$post->created_at}}</td>
        </tr>
      @endforeach
      
      </tbody>
    </table>
  </div>
  

@include('layouts.footer')