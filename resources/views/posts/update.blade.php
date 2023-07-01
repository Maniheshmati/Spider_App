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
    <form action="/updateInfo" method="GET">
        <label for="id">Post ID:</label>
        <input type="number" name="id" placeholder="Post ID">
        <br>
        <label for="postTitle">Title: </label>
        <input type="text" name="postTitle" placeholder="Post Title">
        <br>
        <label for="postBody">Body: </label>
        <textarea name="postBody" id="postBody" cols="30" rows="10" placeholder="Post Body"></textarea>
        <br>
        <input type="submit">
    </form>


</body>
</html>


@include('layouts.footer')