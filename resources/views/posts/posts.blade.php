@include('layouts.header')
@inject('posts', 'App\Models\Post')

<div class="container">
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
        @foreach ($posts::all() as $post)
          <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  

@include('layouts.footer')