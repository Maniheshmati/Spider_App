@include('layouts.header')
@inject('catagories', 'App\Models\Catagory')
<a href="{{ route('catagories.show', $catagories->slug) }}">{{ $catagories->name }}</a>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($catagories::all() as $catagory)
        <tr>
          <td><a href="/post/{{$catagory->id}}" class="nav-link"> {{ $catagory->id }}</a></td>
          <td><a href="/catagory/{{$catagory->name}}" class="nav-link">{{ $catagory->name }}</a></td>


        </tr>
      @endforeach
    </tbody>
  </table>
