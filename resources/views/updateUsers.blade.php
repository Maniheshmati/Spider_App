@include('layouts.header')

<head>
    <style>

    </style>
</head>

<body>
    <form action="" method="POST">
        @csrf
        <label for="name">Name: </label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        <label for="username">User Name:  </label>
        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
        <label for="email">Email: </label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        <input type="submit" value="Update">
    </form>
</body>