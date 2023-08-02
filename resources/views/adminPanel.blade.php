@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spider-Verse Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Spider-Verse theme styles */
        body {
            background-color: #f7f7f7;
            font-family: "Arial", sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-heading {
            font-size: 24px;
            font-weight: bold;
            color: #d83c3c;
        }

        .admin-section {
            border: 1px solid #d83c3c;
            padding: 20px;
            margin-top: 20px;
            background-color: #fff;
        }

        .admin-button {
            background-color: #d83c3c;
            color: #fff;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            font-size: 14px;
        }

        .admin-button:hover {
            background-color: #b33b3b;
        }

        .user-item, .post-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .user-item:last-child, .post-item:last-child {
            border-bottom: none;
        }

        /* Additional styles for the Spider-Verse theme can be added here */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="admin-heading">Spider-Verse Admin Panel</h1>

        <!-- Users Section -->
        <div class="admin-section">
            <h2>Manage Users</h2>
             @foreach($users as $user)
            <div class="user-item">
               
                <p>{{ $user->name }}</p>
                <div>
                    <a href="/user/{{ $user->id }}/update"><button class="admin-button">Update</button></a>
                    <a href="/user/{{ $user->username }}"><button class="admin-button">Delete</button></a>
                </div>
                
            </div>
            @endforeach
            <!-- Add more user items here -->
            <a href="/users/register"><button class="admin-button">Create User</button></a>
        </div>

        <!-- Posts Section -->
        <div class="admin-section">
            <h2>Manage Posts</h2>
            @foreach($posts as $post)
            <div class="post-item">
                <p>{{ $post->title }}</p>
                <div>
                    <a href="/post/{{ $post->id }}/update"><button class="admin-button">Update</button></a>
                    <a href="/post/{{ $post->id }}/delete"><button class="admin-button">Delete</button></a>
                </div>
            </div>
            @endforeach
            <!-- Add more post items here -->
            <button class="admin-button">Create Post</button>
        </div>

        <!-- Permissions and Roles Section -->
        <div class="admin-section">
            <h2>Give Permissions and Roles</h2>
            <!-- Add your content for permissions and roles here -->
        </div>
    </div>
</body>
</html>
