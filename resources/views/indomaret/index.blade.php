
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Data Indomaret</title>
</head>
<body>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="bagian.blade.php">Tabel bagian</a>
                    <a class="nav-item nav-link" href="#">Tambah bagian</a>
                    <a class="nav-item nav-link" href="#">Daftar Karyawan</a>
                    <a class="nav-item nav-link" href="karyawan.blade.php">Tabel Karyawan</a>
                    <a class="nav-item nav-link" href="#">Blog Karyawan</a>
                </div>
            </div>

            {{-- Dropdown --}}
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}

    {{-- Table --}}

    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-sm-6"><h3>Produk Indomaret</h3></div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('indomarets.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <table class="table table-hover table-info">
                    <thead class="thead-dark text-center">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">ID</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Penjaga Toko</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($indomarets as $indomaret)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ url('/indomarets/'. $indomaret->id_produk) }}">{{ $indomaret->nama_produk }}</a></td>
                                <td>{{ $indomaret->jenis_produk }}</td>
                                <td>{{ $indomaret->penjaga_toko == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                                <td>{{ $indomaret->harga_produk }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning text-center">Update</a>
                                    <a href="#" class="btn btn-danger text-center">Delete</a>
                                </td>
                                {{-- <td>{{ $indomaret->alamat == '' ? 'N/A' : $indomaret->alamat }}</td> --}}
                            </tr>
                        @empty
                        <td colspan="6" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- End Table --}}
<div class="footer bg-dark py-3">
    <div class="container">
        <h5 class="text-center text-white font-weight-bold">&#169; Copyright 2020 PT. Kuylah.Tbk </h5>
    </div>
</div>
    

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>