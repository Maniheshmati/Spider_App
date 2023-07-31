@include('layouts.header')
@inject('User', 'App\Models\User')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <style>
        /* Add your custom styles here */

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            /* padding: 20px; */
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

        .post-card {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .post-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .post-body {
            margin-bottom: 20px;
        }

        .comment-card {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
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

        .actions-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .action-btn {
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .action-btn-primary {
            background-color: #007bff;
        }

        .action-btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="post-card">
            <form method="POST">
                @csrf
                @if (Auth::user()->username == 'peter')
                    @if($post->is_done == false)
                    <label for="checkBox">Check</label>
                    <input type="checkbox" name="checkBox" value="{{ $post->id }}">
                    @else
                    <h5>Done</h5>
                    @endif
                @endif
            <div class="post-title">{{ $post->title }}</div>
            <div class="post-body">{{ $post->body }}</div>
        </div>

        @if (auth()->check())
            @if (Auth::user()->id == $post->user_id or Auth::user()->hasRole('owner') or Auth::user()->hasRole('admin'))
                <div class="actions-container">
                    <a href="{{ route('posts.create', ['id' => $post->id]) }}"
                        class="action-btn action-btn-primary">Create Post</a>
                    <a href="{{ route('posts.update', ['id' => $post->id]) }}"
                        class="action-btn action-btn-primary">Update Post</a>
                    <a href="{{ route('posts.delete', ['id' => $post->id]) }}"
                        class="action-btn action-btn-primary">Delete Post</a>
                </div>
            @endif
        @endif



        @if (Auth::check())
                <label for="body" class="label">Comment:</label>
                <textarea name="body" class="form-control"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="submit" value="Submit" class="action-btn action-btn-primary">
            </form>
        @endif

        <h2>Comments</h2>
        @php
            $reversedComments = array_reverse($post->comments->toArray());
        @endphp
        @foreach ($reversedComments as $comment)
            @php
                $user = $User::where('id', $comment['user_id'])->first();
                $commentTime = \Carbon\Carbon::parse($comment['created_at'])->diffForHumans();
            @endphp

            <div class="comment-card">
                @if (Auth::check() && Auth::user()->id == $user->id)
                    <div class="comment-author">You</div>
                @else
                    <div class="comment-author">{{ $user->name }}</div>
                @endif
                <div class="comment-body">{{ $comment['body'] }}</div>
                <div class="comment-time">{{ $commentTime }}</div>
            </div>
        @endforeach
    </div>
</body>

</html>
