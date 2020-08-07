@extends('layouts.app')
@section('content')
    
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
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-8">
                <h1 class="h1 pt-2">Tambah Bagian</h1>
                <hr>
                <form action="{{ url('/bagians') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_bagian">nama bagian</label>
                        <input type="text" class="form-control @error('nama_bagian') is-invalid @enderror" id="nama_bagian" name="nama_bagian" value="{{ old('nama_bagian') }}">
                        @error('nama_bagian')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_supervisor">Nama Supervisor</label>
                        <input type="text" class="form-control @error('nama_supervisor') is-invalid @enderror" id="nama_supervisor" name="nama_supervisor" value="{{ old('nama_supervisor') }}">
                        @error('nama_supervisor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_bagian">Jumlah Bagian</label>
                        <input type="text" class="form-control @error('jumlah_bagian') is-invalid @enderror" id="jumlah_bagian" name="jumlah_bagian" value="{{ old('jumlah_bagian') }}">
                        @error('jumlah_bagian')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

@endsection