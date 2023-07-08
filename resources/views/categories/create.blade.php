@include('layouts.header')

<form action="" method="post">
    @csrf
    <input type="text" name="name" placeholder="Category Name">
    <input type="submit">
</form>
