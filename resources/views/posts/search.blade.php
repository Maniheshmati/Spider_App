@include('layouts.header')

<div class="container">
  <div class="row mt-4">
    <div class="col-12 text-center">
      <a href="/posts/create" class="btn btn-primary mx-2">Create Post</a>
      <a href="/posts/update" class="btn btn-primary mx-2">Update Post</a>
      <a href="/posts/delete" class="btn btn-primary mx-2">Delete Post</a>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12 text-center">
      <h1 class="text-danger">Search Results</h1>
    </div>
    <div class="col-12">
      <div class="row">
        @if(isset($posts))
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h5>
              <p class="card-text">{{ $post->body }}</p>
              <p class="card-text">Release Date: {{ $post->created_at }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif

        @if(!isset($posts) || count($posts) === 0)
        <div class="col-12 text-center">
          <p class="text-muted">No posts found matching your search criteria.</p>
        </div>
        @endif
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12 text-center">
      <h1 class="text-danger">Users</h1>
    </div>
    <div class="col-12">
      <div class="row">
        @if(isset($users))
        @foreach ($users as $user)
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="/user/{{ $user->username }}">{{ $user->name }}</a></h5>
              <p class="card-text">User Name: {{ $user->username }}</p>
              <p class="card-text">Email: {{ $user->email }}</p>
            </div>
          </div>
        </div>
        @endforeach
        @endif

        @if(!isset($users) || count($users) === 0)
        <div class="col-12 text-center">
          <p class="text-muted">No users found matching your search criteria.</p>
        </div>
        @endif
      </div>
    </div>
  </div>

</div>

@include('layouts.footer')
