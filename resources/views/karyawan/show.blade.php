@extends('layouts.app')

@section('content')
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3">
                    <div class="pt-3 d-flex justify-content-end align-items-center">
                        <h1 class="h1 mr-auto">Biodata {{ $Karyawan->nama }}</h1>
                        <a href="{{ route('Karyawans.index') }}" class="btn btn-dark">Back</a>
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
                            <th scope="col">Nik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Bagian</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Hobi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $Karyawan->nik }}</td>
                            <td>{{ $Karyawan->nama }}</td>
                            <td>{{ $Karyawan->telepon->nomor_telepon }}</td>
                            <td>{{ $Karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                            <td>{{ $Karyawan->bagian->nama_bagian }}</td>
                            <td>{{ $Karyawan->alamat == '' ? 'N/A' : $Karyawan->alamat}}</td>
                            <td>
                                @foreach ($Karyawan->hobi as $item)
                                    {{ " $item->nama_hobi, "}}
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection