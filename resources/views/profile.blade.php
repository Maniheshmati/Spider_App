@include('layouts/header')
<html>
    <header>
        <title>{{$user->username}}</title>
    </header>
    <h1>{{$user->name}}</h1>
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
        @foreach ($posts::where('user_id', $user->id)->get() as $post)
        @php
        $username = $user::find($post->user_id)->username;
        @endphp
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$username}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>

          </tr>
        @endforeach
      </tbody>
      
    </table>


@include('layouts/footer')
