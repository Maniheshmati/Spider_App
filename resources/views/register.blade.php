@include("layouts.header")

<div class="container">
    <h1>Register</h1>
    <form action="" method="POST">
      <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
          {{$errors->first('email')}}
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
          {{$errors->first('username')}}
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
          {{$errors->first('password')}}

      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>


@include('layouts.footer')
