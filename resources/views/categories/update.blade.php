@include('layouts.header')
<form method="post" name="update" >
    @csrf
    <label for="category_name">Name</label>
    <input type="text" placeholder="Category Name" name="category_name">
    <input type="submit" value="Change Name">
</form>
