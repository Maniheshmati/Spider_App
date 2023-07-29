@include('layouts.header')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spider-Man Help Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Spider-Man theme styles */
        .spiderman-bg {
            background-image: url('https://example.com/spiderman-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .spiderman-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #d83c3c;
            border-radius: 5px;
            background-color: #fff;
        }

        .spiderman-label {
            color: #d83c3c;
            font-weight: bold;
        }

        .spiderman-input {
            border: 1px solid #d83c3c;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .spiderman-submit {
            background-color: #d83c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .spiderman-submit:hover {
            background-color: #c32b2b;
        }

        .spiderman-error {
            color: #d83c3c;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-red-600 py-4 spiderman-bg">
        <!-- ... Header content here ... -->
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8">
        <form action="" method="post" class="spiderman-form">
            @csrf
            <label for="postTitle" class="spiderman-label">Title</label>
            <input type="text" name="title" placeholder="Title" class="spiderman-input @error('title') is-invalid @enderror">

            @error('title')
            <div class="spiderman-error">{{ $message }}</div>
            @enderror

            <label for="postBody" class="spiderman-label">Body</label>
            <input type="text" name="body" placeholder="Body" class="spiderman-input">

            @error('body')
            <div class="spiderman-error">{{ $message }}</div>
            @enderror

            <br>
            <select name="category" class="spiderman-input">
                @if ($categories)
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endif
            </select>
            <br>
            <input type="submit" value="Submit" class="spiderman-submit">

            @error('category')
            <div class="spiderman-error">{{ $message }}</div>
            @enderror
        </form>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 text-white text-center">
        @include('layouts.footer')
    </footer>
</body>

</html>

