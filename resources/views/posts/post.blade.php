@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
              <th>Created at</th>
              <th>Updated at</th>
          </tr>
        </thead>
        <tbody>

            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>

            </tr>
        </tbody>
      </table>
      <br><br><br>
      @if (Auth::user()->id == $post->user_id)
      <a href="{{ route('posts.create', ['id' => $post->id]) }}"><button class="btn btn-primary">Create Post</button></a>
    <a href="{{ route('posts.update', ['id' => $post->id]) }}"><button class="btn btn-primary">Update Post</button></a>
    <a href="{{ route('posts.delete', ['id' => $post->id]) }}"><button class="btn btn-primary">Delete Post</button></a>
    <a href="/"><button class="btn btn-primary">Search in posts</button></a>
      @endif
</body>
</html>
