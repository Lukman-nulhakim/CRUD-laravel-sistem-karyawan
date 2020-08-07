@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-sm-6"><h3>Tabel Data Karyawan</h3></div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('Karyawans.create') }}" class="btn btn-primary">Tambah Karyawan</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <table class="table table-hover table-info">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Bagian</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Hobi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($karyawans as $karyawan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ url('/Karyawans/'. $karyawan->id) }}">{{ $karyawan->nik }}</a></td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->telepon->nomor_telepon }}</td>
                                <td>{{ $karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</td>
                                <td>{{ $karyawan->bagian->nama_bagian }}</td>
                                <td>{{ $karyawan->alamat == '' ? 'N/A' : $karyawan->alamat }}</td>
                                <td>
                                    @foreach ($karyawan->hobi as $item)
                                        {{ $item->nama_hobi }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('Karyawans.edit', ['Karyawan' => $karyawan->id]) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('Karyawans.destroy', ['Karyawan' => $karyawan->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                        </form>
                                        <a href="{{ route('Karyawans.show', ['Karyawan' => $karyawan->id]) }}" class="btn btn-info ml-2">Show</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <td colspan="8" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection