@include('layouts.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete post</title>
</head>
<body>
    <form action="/deleteInfo" method="GET">

        <input type="number" name="id" placeholder="ID">
        <br>
        <input type="submit">
    </form>
</body>
</html>
@include('layouts.footer')