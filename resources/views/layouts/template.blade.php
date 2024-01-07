<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rekapitulasi keterlambatan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="#">Rekap keterlambatan</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                  </li>
                  @if(Auth::check())
                  @if(Auth::user()->role == "admin")
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Data master
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('rombels.index') }}">Data Rombel</a></li>
                      <li><a class="dropdown-item" href="{{ route('rayons.home') }}">Data Rayon</a></li>
                      <li><a class="dropdown-item" href="{{ route('users.home') }}">Data User</a></li>
                      <li><a class="dropdown-item" href="{{ route('students.home') }}">Data Siswa</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('lates.index') }}">Data keterlambatan</a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('ps.students.home') }}">Data Siswa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('ps.lates.index') }}">Data keterlambatan</a>
                  </li>
                 @endif
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
        </nav>

        <div class="container mt-5">
            @yield('content')
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
        @stack('script')
      
    </body>
</html>
