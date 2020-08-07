<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="narvbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                @auth
                <ul class="navbar-nav mr-aouto">
                    <li class="nav-item">
                        <a href="{{ url('/daftar-karyawan') }}" class="nav-link">
                            Daftar Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/tabel-karyawan') }}" class="nav-link">
                            Tabel Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/blog-karyawan') }}" class="nav-link">
                            Blog Karyawan
                        </a>
                    </li>
                </ul>
                @endauth
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="text-light">Selamat datang, <b>{{ session('username') }}</b></span>
                        <a href="{{ url('/logout') }}" class="nav-link d-inline">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="my-4">{{ $judul }}</div>
    </div>


</body>
</html>