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
    <div class="container mt-2">
        <h1>File Upload</h1>
        <hr>
        <form action="{{ url('/file-upload-rename') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nama_gambar">Nama Gambar</label>
                <input type="text" class="form-control-file" id="nama_gambar" name="nama_gambar">
            </div>
            <div class="form-group">
                <label for="gambar_profile">Foto Profile</label>
                <input type="file" class="form-control-file" id="gambar_profile" name="gambar_profile">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>