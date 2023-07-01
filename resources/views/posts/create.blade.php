@include('layouts.header')
@inject('posts', 'App\Models\Post')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/insertInfo" method="get">
        <label for="postTitle">Title</label>
        <input type="text" name="postTitle" placeholder="Title">
        <label for="postBody">Body</label>
        <input type="text" name="postBody" placeholder="Body">
        <br>
        <input type="submit">


    </form>
</body>
</html>
@include('layouts.footer')
