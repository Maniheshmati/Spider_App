@extends('layouts.app')
@include('layouts.header')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>


    <p name="name">Name: {{ Auth::User()->name }}</p>
    <p name="username">Username: {{ Auth::User()->username }}</p>
    <p name="email">Email: {{ Auth::User()->email }}</p>
    <p>Permissions: </p>
    @if($permissions)
    @foreach($permissions as $permission)
        <li>{{ $permission->name }}</li>
    @endforeach
    @endif

@if($role)
    <p>Role: {{ $role->name }}</p>
    @if($role->name == 'owner')
    <button class="btn btn-primary"><a href="{{ route('permission') }}" class="nav-link" style="color: white;">permissions</a></button>
    <button class="btn btn-primary"><a href="{{ route('role') }}" class="nav-link" style="color: white;">Roles</a></button>

    @endif
@endif
@endsection

<form method="POST" action="">
    @csrf
    <button class="btn btn-primary">Logout</button>

</form>


