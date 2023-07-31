<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
@inject('posts', 'App\Models\Post')
@inject('users', 'App\Models\User')
@inject('categories', 'App\Models\Catagory')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spider-Man Help Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Spider-Man theme styles */
        .spiderman-bg {
            background-image: url('https://example.com/spiderman-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .spiderman-title {
            color: #d83c3c;
        }

        .spiderman-card {
            border-color: #d83c3c;
        }

        .spiderman-btn {
            background-color: #d83c3c;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-red-600 py-4 spiderman-bg">
        <div class="container mx-auto text-center text-white">
            <h1 class="text-3xl font-bold spiderman-title" style="color: white;">Spider-Man Help Requests</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto my-8">
        @php
        $reversedPosts = $posts::all()->sortByDesc('created_at');
    @endphp
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($reversedPosts as $post)
            <div class="bg-white rounded-lg shadow-md p-4 spiderman-card">
                <h2 class="text-xl font-semibold mb-2"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
                <p class="text-gray-600 mb-4">{{ $post->body }}</p>
                <p class="text-gray-500 text-sm">Posted by {{ $post->user->username }} - {{ $post->created_at->diffForHumans() }}</p>
                @if ($post->is_done == true)
                    <p class="text-gray-500 text-sm">Done</p>
                    @endif
            </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 py-4 text-white text-center">
        <p>&copy; {{ date('Y') }} Spider-Man Help Requests</p>
    </footer>
</body>

</html>
