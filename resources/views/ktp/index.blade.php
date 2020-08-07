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
        <div class="row mt-5 mb-3">
            <div class="col-sm-6"><h3>Tabel Data Karyawan</h3></div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('ktp.create') }}" class="btn btn-primary">Tambah Karyawan</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped"> 
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No KK</th>
                            <th>Foto</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th>Pendidikan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($item as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->nama }}</td>
                                <td>{{ $items->alamat == '' ? 'N/A' : $items->alamat }}</td>
                                <td>{{ $items->no_kk }}</td>
                                <td>
                                    <img src="{{ Storage::url($items->foto) }}" alt="" style="width:50px;">
                                </td>
                                <td>{{ $items->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                <td>{{ $items->status }}</td>
                                <td>{{ $items->pendidikan }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('ktp.edit', $items->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('ktp.destroy', ['ktp' => $items->id]) }}" method="POST">
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