@include('layouts.header')
@inject('category', 'App\Models\Catagory')
<a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
