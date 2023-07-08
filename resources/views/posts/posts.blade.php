@include('layouts.header')
@inject('posts', 'App\Models\Post')
@inject('users', 'App\Models\User')
@inject('catagories', 'App\Models\Catagory')
<div class="container">

    <h1>Posts</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Catagory</th>
          <th>Title</th>
          <th>Text</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts::all() as $post)
        @php
        $username = $users::find($post->user_id)->username;
        $catagory = $catagories::find($post->category_id)->name;
        @endphp
          <tr>
            <td><a href="/post/{{$post->id}}" class="nav-link"> {{ $post->id }}</a></td>
            <td><a href="/post/{{$post->id}}" class="nav-link">{{ $username }}</a></td>
            <td><a href="/catagory/{{$catagory}}" class="nav-link">{{ $catagory }}</a></td>
            <td><a href="/post/{{$post->id}}" class="nav-link">{{ $post->title }}</a></td>
            <td><a href="/post/{{$post->id}}" class="nav-link">{{ $post->body}}</a></td>
            <td><a href="/post/{{$post->id}}" class="nav-link">{{$post->created_at }}</a></td>
              <td><a href="/post/{{$post->id}}" class="nav-link">{{ $post->updated_at }}</a></td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


@include('layouts.footer')
