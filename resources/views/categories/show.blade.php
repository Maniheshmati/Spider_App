@include('layouts.header')
@inject('categories','App\Models\Catagory' )
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
          <th>Operations</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($categories::all() as $category)
        <tr>
          <td><a href="/category/{{$category->id}}" class="nav-link"> {{ $category->id }}</a></td>
          <td><a href="/category/{{$category->name}}" class="nav-link">{{ $category->name }}</a></td>
            <form method="Post" action="{{ route('category.delete') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
                <td><input name="delete" type="submit" value="Delete" class="btn btn-primary"></td>
            </form>
            <form method="get" action="{{ route('category.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
                <td><input name="update" type="submit" value="Update" class="btn btn-primary"> </td>
            </form>



        </tr>
      @endforeach
    </tbody>
    <br><br>
    <a href="{{ route('catagory.create') }}"><button class="btn btn-primary">Create Catagory</button></a>

  </table>
