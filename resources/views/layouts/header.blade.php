
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d83c3c">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Spider Man</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts">Posts</a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">Search</a>
            </li>

                @if (Auth::check())
                    <a href="/home" class="nav-link">Dashboard</a>
                
                @else
                <li class="nav-item">
                    <a href="/users/login" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/users/register" class="nav-link">Register</a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="/users" class="nav-link">Users</a>
                </li>
                <li class="nav-item">
                    <a href="/category/" class="nav-link">Category</a>
                </li>
              <li class="nav-item">
                  <a href="/permission/" class="nav-link">Permission</a>
              </li>
              <li class="nav-item">
                  <a href="/roles/" class="nav-link">Roles</a>
              </li>
              <li class="nav-item">
                <a href="/map" class="nav-link">Map</a>
            </li>



          </ul>
        </div>
      </div>
    </nav>
  </header>
