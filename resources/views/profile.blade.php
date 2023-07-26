@include('layouts.header')
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
        @foreach ($post as $item)
        @php
        $username = $user->username;
        @endphp
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$username}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->body}}</td>
            <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>

          </tr>
        @endforeach
      </tbody>

    </table>


@include('layouts.footer')
