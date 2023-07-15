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
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('category')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <form action="" method="post">
        @csrf
        <label for="postTitle">Title</label>
        <input type="text" name="title" placeholder="Title" class="@error('title') is-invalid @enderror">

        {{--        <ul>--}}
{{--        @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--        @endforeach--}}
{{--        </ul>--}}
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
        </select>
        <br>
        <input type="submit">


    </form>
</body>
</html>
@include('layouts.footer')
