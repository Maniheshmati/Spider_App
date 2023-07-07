@include('layouts.header')

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
        @if(isset($posts))
        @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->body }}</td>
          <td>{{ $post->created_at }}</td>
          <td>{{ $post->updated_at }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
  <h1>Users</h1>

  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($users))
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td><a href="/user/{{ $user->username }}">{{ $user->name }}</a></td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>

@include('layouts.footer')
