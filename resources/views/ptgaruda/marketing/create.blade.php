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
                <h1 class="text-center">Data Karyawan</h1>
                <hr>
                <form action="{{ route('marketings.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan') }}">
                        @error('nama_karyawan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_karyawan">Alamat</label>
                        <textarea class="form-control" name="alamat_karyawan" id="alamat_karyawan" rows="3">
                            {{ old('alamat_karyawan') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>
                            <label for="laki-laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                            <label for="Perempuan" class="form-check-label">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" value="{{ old('gaji') }}">
                        @error('gaji')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jobdesk">Jobdesk</label>
                        <select name="jobdesk" id="jobdesk" class="form-control" >
                            <option value="Frontend Developer" {{ old('jobdesk') == 'Frontend Developer' ? 'selected' : '' }}>
                                Promotion
                            </option>
                            <option value="Backend Developer" {{ old('jobdesk') == 'Backend Developer' ? 'selected' : '' }}>
                                Digital Marketing
                            </option>
                            <option value="Fullstack Developer" {{ old('jobdesk') == 'Fullstack Developer' ? 'selected' : '' }}>
                                Database Marketing
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>