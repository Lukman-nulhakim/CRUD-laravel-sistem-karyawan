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
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3">
                    <div class="pt-3 d-flex justify-content-end align-items-center">
                        <h1 class="h1 mr-auto">Biodata {{ $indomaret->nama_produk }}</h1>
                        <a href="{{ route('indomarets.edit', ['indomaret' => $indomaret->id_produk]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('indomarets.destroy', ['indomaret' => $indomaret->id_produk]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                        </form>
                    </div>
                    <hr>
                    @if (session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('pesan') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-warning">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Penjaga Toko</th>
                            <th scope="col">Harga Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $indomaret->nama_produk }}</td>
                            <td>{{ $indomaret->jenis_produk  }}</td>
                            <td>{{ $indomaret->penjaga_toko == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                            <td>{{ $indomaret->harga_produk }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>