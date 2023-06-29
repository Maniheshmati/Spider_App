@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
</head>
<body>
    <form action="/posts" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title">

    <input type="submit" name="submit">

    </form>
</body>
</html>
@include('layouts.footer')