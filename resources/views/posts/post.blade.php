@include('layouts.header')
@inject('User','App\Models\User')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .comment-author {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .comment-body {
            margin-bottom: 5px;
        }
        .comment-time {
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
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

        @if (Auth::user()->id == $post->user_id OR Auth::user()->hasRole('owner') OR Auth::user()->hasRole('admin'))
            <a href="{{ route('posts.create', ['id' => $post->id]) }}"><button class="btn btn-primary">Create Post</button></a>
            <a href="{{ route('posts.update', ['id' => $post->id]) }}"><button class="btn btn-primary">Update Post</button></a>
            <a href="{{ route('posts.delete', ['id' => $post->id]) }}"><button class="btn btn-primary">Delete Post</button></a>
            <a href="/"><button class="btn btn-primary">Search in posts</button></a>
        @endif

        <form method="POST"">
            @csrf
            <label for="body" class="label"> Comment:</label>
            <textarea name="body" class="form-control" required></textarea>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="submit" value="Comment" class="btn btn-primary">
        </form>

        <h2>Comments</h2>
        @php
        $reversedComments = array_reverse($post->comments->toArray());
        @endphp
        @foreach ($reversedComments as $comment)
        @php
            $user = $User::where('id', $comment['user_id'])->first();
            $commentTime = \Carbon\Carbon::parse($comment['created_at'])->diffForHumans();

        @endphp
        
        
            <div class="comment">
                <div class="comment-author">{{ $user->name }}</div>
                <div class="comment-body">{{ $comment['body'] }}</div>
                <div class="comment-time">{{ $commentTime }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
