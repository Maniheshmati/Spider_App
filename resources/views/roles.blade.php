@include('layouts.header')

<body>
<form action="" method="POST">
    @csrf
    <select name="role">
        @if ($roles)
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->display_name }}</option>
            @endforeach
        @endif
        {{$errors->first('role')}}
    </select>
    <select name="user">
        @if ($users)
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        @endif
        {{$errors->first('role')}}
    </select>

    <input type="submit">
</form>
</body>
