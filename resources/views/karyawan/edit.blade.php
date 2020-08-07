@extends('layouts.app')
@section('content')
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Karyawan</h1>
                <hr>
                <form action="{{ route('Karyawans.update', ['Karyawan' => $Karyawan->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') ?? $Karyawan->nik }}">
                        @error('nik')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $Karyawan->nama}}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_telepon">Nomer Telepon</label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') ?? $Karyawan->telepon->nomor_telepon }}">
                        @error('nomor_telepon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="L" {{ old('jenis_kelamin') ?? $Karyawan->jenis_kelamin == 'L' ? 'checked' : '' }}>
                            <label for="laki-laki" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="P" {{ old('jenis_kelamin') ?? $Karyawan->jenis_kelamin == 'P' ? 'checked' : '' }}>
                            <label for="Perempuan" class="form-check-label">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bagian_id">Bagian</label>
                        <select name="bagian_id" id="bagian_id" class="form-control">
                            @foreach ($bagians as $bagian)
                                <option value="{{ $bagian->id }}" {{ (old('bagian_id') ?? $Karyawan->bagian_id ) == $bagian->nama_bagian ? 'selected' : '' }}>
                                    {{ $bagian->nama_bagian }}
                                </option>
                            @endforeach
                        </select>
                        @error('bagian_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') ?? $Karyawan->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Pilih Hobi</label>
                        <select class="selectHobi js-states form-control" multiple="multiple" name="hobi[]">
                            @foreach ($daftar_hobi as $tampil_hobi)
                                <option value="{{ $tampil_hobi->id }}">{{ $tampil_hobi->nama_hobi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $('.selectHobi').select2().val({!! json_encode($Karyawan->hobi()->allRelatedIds() ) !!}).triger('change');
</script>
@endsection