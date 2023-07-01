@include('layouts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <form action="search" method="get">
    <input type="text" name="search" placeholder="Search">
    <input type="Submit">
    </form>
</body>
</html>

@include('layouts.footer')