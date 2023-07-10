@include('layouts.header')

<head>
    <title>Permission</title>
</head>

<body>
<form action="{{ route('permission') }}" method="POST">
    @csrf
        @if($permissions)
            @foreach($permissions as $permission)
                <label for="{{ $permission->name }}">{{ $permission->display_name }}</label>
            <input type="checkbox" value="{{ $permission->name }}" name="permission[]">
            <br>
            @endforeach
        @endif

        <select name="user">
            @if ($users)
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            @endif
            {{$errors->first('category')}}
        </select>

        <input type="submit">
    </form>
</body>
