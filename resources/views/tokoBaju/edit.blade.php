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
                <h1 class="text-center">Data Produk</h1>
                <hr>
                <form action="{{ route('tokoBaju.update', ['tokoBaju' => $tokoBaju->id_toko]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_toko">Nama Toko </label>
                        <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" id="nama_toko" name="nama_toko" value="{{ old('nama_toko') ?? $tokoBaju->nama_toko }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_toko">Alamat Toko</label>
                        <textarea class="form-control" id="alamat_toko" name="alamat_toko" rows="3">{{ old('alamat_toko') ?? $tokoBaju->alamat_toko }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="merk_baju">Merk Baju</label>
                        <input type="text" class="form-control @error('merk_baju') is-invalid @enderror" id="merk_baju" name="merk_baju" value="{{ old('merk_baju') ?? $tokoBaju->merk_baju }}">
                    </div>
                    <div class="form-group">
                        <label for="pengelola">Pengelola</label>
                        <input type="text" class="form-control @error('pengelola') is-invalid @enderror" id="pengelola" name="pengelola" value="{{ old('pengelola') ?? $tokoBaju->pengelola }}">
                    </div>
                    <div class="form-group">
                        <img src="{{ Storage::url($tokoBaju->foto) }}" alt="" style="width: 50px;">
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga" id="harga" name="harga" value="{{ old('harga') ?? $tokoBaju->harga }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="warna">Warna</label>
                        <select class="custom-select" name="warna" id="warna" class="form-control" >
                            <option selected>Choose...</option>
                            <option value="Hitam" {{ (old('warna') ?? $tokoBaju->warna ) == 'Hitam' ? 'selected' : '' }}>
                                Hitam
                            </option>
                            <option value="Putih" {{ (old('warna') ?? $tokoBaju->warna ) == 'Putih' ? 'selected' : '' }}>
                                Putih
                            </option>
                            <option value="Merah" {{ (old('warna') ?? $tokoBaju->warna ) == 'Merah' ? 'selected' : '' }}>
                                Merah
                            </option>
                            <option value="Kuning" {{ (old('warna') ?? $tokoBaju->warna ) == 'Kuning' ? 'selected' : '' }}>
                                Kuning
                            </option>
                            <option value="Biru" {{ (old('warna') ?? $tokoBaju->warna ) == 'Biru' ? 'selected' : '' }}>
                                Biru
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Simpan</button>
                </form>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>