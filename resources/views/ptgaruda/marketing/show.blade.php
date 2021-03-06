<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body class="bg bg-light">
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3">
                    <div class="pt-3 d-flex justify-content-end align-items-center">
                        <h1 class="h1 mr-auto">Biodata {{ $marketing->nama_karyawan }}</h1>
                        <a href="{{ route('marketings.edit', ['marketing' => $marketing->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('marketings.destroy', ['marketing' => $marketing->id]) }}" method="POST">
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
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Alamat Karyawan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Jobdesk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $marketing->nama_karyawan }}</td>
                            <td>{{ $marketing->alamat_karyawan == '' ? 'N/A' : $marketing->alamat_karyawan}}</td>
                            <td>{{ $marketing->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                            <td>{{ $marketing->gaji }}</td>
                            <td>{{ $marketing->jobdesk }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>