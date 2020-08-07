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
                <div class="py-4">
                    <h2>Tabel Data Karyawan</h2>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">Tambah Karyawan</a>
                </div>
                <table class="table table-striped"> 
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($item as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->nama }}</td>
                                <td>{{ $items->alamat }}</td>
                                <td>
                                    <img src="{{ Storage::url($items->image) }}" alt="" style="width:50px;">
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('gallery.edit', $items->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('gallery.destroy', ['gallery' => $items->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
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