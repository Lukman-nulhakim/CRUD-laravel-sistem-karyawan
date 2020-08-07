<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="narvbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
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
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="my-4">
            Form Login
        </h2>
        <hr>
        @if (session()->has('pesan'))
            <div class="alert alert-info w-50">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Masukan Username</label>
                <input type="text" class="form-control w-50" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>


</body>
</html>