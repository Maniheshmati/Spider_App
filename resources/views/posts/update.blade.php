@include('layouts.header')
@inject('posts', 'App\Models\Post')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify Post</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <br>
        <label for="postTitle">Title: </label>
        <input type="text" name="title" placeholder="Post Title" value="{{ $post->title }}">
        <br>
        <label for="postBody">Body: </label>
        <textarea name="body" id="body" cols="30" rows="10" >{{ $post->body }}</textarea>
        <br>
        <input type="submit">
    </form>


</body>
</html>


@include('layouts.footer')
