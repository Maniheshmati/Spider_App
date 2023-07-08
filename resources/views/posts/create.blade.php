@include('layouts.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <label for="postTitle">Title</label>
        <input type="text" name="title" placeholder="Title">
        {{$errors->first('title')}}
        <label for="postBody">Body</label>
        <input type="text" name="body" placeholder="Body">
        {{$errors->first('body')}}
        <br>
        <select name="category">
            @if ($categories)
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        @endif
        {{$errors->first('category')}}
        </select>
        <br>
        <input type="submit">


    </form>
</body>
</html>
@include('layouts.footer')
