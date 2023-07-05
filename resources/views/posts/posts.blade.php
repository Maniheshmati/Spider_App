@include('layouts.header')
@inject('posts', 'App\Models\Post')


<div class="container">
  <a href="posts/create"><button class="btn btn-primary">Create Post</button></a>
  <a href="posts/update"><button class="btn btn-primary">Update Post</button></a>
  <a href="posts/delete"><button class="btn btn-primary">Delete Post</button></a>
  <a href="/"><button class="btn btn-primary">Search in posts</button></a>
  <br>
    <h1>Posts</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Title</th>
          <th>Text</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts::all() as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


@include('layouts.footer')
