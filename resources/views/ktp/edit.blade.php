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
                <h1 class="text-center">Data Karyawan</h1>
                <hr>
                <form action="{{ route('ktp.update', $ktp->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $ktp->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') ?? $ktp->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_kk">no_kk</label>
                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk') ?? $ktp->no_kk }}">
                    </div>
                    <div class="form-group">
                        <img src="{{ Storage::url($ktp->foto) }}" alt="" style="width: 50px;">
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="L" {{ old('jenis_kelamin') ?? $ktp->jenis_kelamin == 'L' ? 'checked' : '' }}>
                            <label for="laki-laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="P" {{ old('jenis_kelamin') ?? $ktp->jenis_kelamin == 'P' ? 'checked' : '' }}>
                            <label for="Perempuan" class="form-check-label">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" >
                            <option value="belum menikah" {{ (old('status') ?? $ktp->status )== 'belum menikah' ? 'selected' : '' }}>
                                Belum menikah
                            </option>
                            <option value="sudah menikah" {{ (old('status') ?? $ktp->status )== 'sudah menikah' ? 'selected' : '' }}>
                                Sudah menikah
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control" >
                            <option value="SD" {{ (old('pendidikan') ?? $ktp->pendidikan ) == 'SD' ? 'selected' : '' }}>
                                SD
                            </option>
                            <option value="SMP" {{ (old('pendidikan') ?? $ktp->pendidikan ) == 'SMP' ? 'selected' : '' }}>
                                SMP
                            </option>
                            <option value="SMA/SMK" {{ (old('pendidikan') ?? $ktp->pendidikan ) == 'SMA/SMK' ? 'selected' : '' }}>
                                SMA/SMK
                            </option>
                            <option value="S1" {{ (old('pendidikan') ?? $ktp->pendidikan ) == 'S1' ? 'selected' : '' }}>
                                S1
                            </option>
                            <option value="S2" {{ (old('pendidikan') ?? $ktp->pendidikan ) == 'S2' ? 'selected' : '' }}>
                                S2
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>