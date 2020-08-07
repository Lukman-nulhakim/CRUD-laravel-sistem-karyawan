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
            <div class="col-md-12">
                <h1 class="text-center">Edit Data Indomaret</h1>
                <hr>
                <form action="{{ route('indomarets.update', ['indomaret' => $indomaret->id_produk]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nama_produk">Nama produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') ?? $indomaret->nama_produk }}">
                        @error('nama_produk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_produk">Jenis produk</label>
                        <select name="jenis_produk" id="jenis_produk" class="form-control" >
                            <option value="Makanan Berat" {{ (old('jenis_produk') ?? $indomaret->jenis_produk) == 'Makanan Berat' ? 'selected' : '' }}>
                                Makanan Berat Batu Kali Berat
                            </option>
                            <option value="Makanan Kecit" {{ (old('jenis_produk') ?? $indomaret->jenis_produk) == 'Makanan Kecit' ? 'selected' : '' }}>
                                Makanan Kecit Gak kenyang Atuh
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penjaga_toko">Penjaga Toko</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="penjaga_toko" id="laki-laki" value="L" {{ old('penjaga_toko') ?? $indomaret->penjaga_toko == 'L' ? 'checked' : '' }}>
                            <label for="laki-laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="penjaga_toko" id="perempuan" value="P" {{ old('penjaga_toko') ?? $indomaret->penjaga_toko == 'P' ? 'checked' : '' }}>
                            <label for="Perempuan" class="form-check-label">Perempuan</label>
                        </div>
                        @error('penjaga_toko')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_produk">Harga Produk</label>
                        <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk" value="{{ old('harga_produk') ?? $indomaret->harga_produk }}">
                        @error('harga_produk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>