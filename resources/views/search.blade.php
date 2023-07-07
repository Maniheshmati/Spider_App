@include('layouts.header')

<form action="search" method="GET">
    @csrf
    <div class="form-group">
      <input type="text" name="search" class="form-control" placeholder="Search users...">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
<br>

@include('layouts.footer')
