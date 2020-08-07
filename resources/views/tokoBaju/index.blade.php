<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Home</title>
</head>
<body>
    
    <div class="container mt-3">
        <div class="row mt-5 mb-3">
            <div class="col-sm-6"><h3>Tabel Data Produk</h3></div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('tokoBaju.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-info">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Merk</th>
                            <th>Pengelola</th>
                            <th>Foto</th>
                            <th>Harga</th>
                            <th>Warna</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($item as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->nama_toko }}</td>
                                <td>{{ $items->alamat_toko == '' ? 'N/A' : $items->alamat_toko }}</td>
                                <td>{{ $items->merk_baju }}</td>
                                <td>{{ $items->pengelola }}</td>
                                <td>
                                    <img src="{{ Storage::url($items->foto) }}" alt="" style="width:50px;">
                                </td>
                                <td>{{ $items->harga }}</td>
                                <td>{{ $items->warna }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('tokoBaju.edit', $items->id_toko) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('tokoBaju.destroy', ['tokoBaju' => $items->id_toko]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>