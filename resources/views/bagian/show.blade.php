@extends('layouts.app')

@section('content')
    
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h1 mr-auto">Table Bagian</h1>
                <a href="{{ route('bagians.index') }}" class="btn btn-dark">Back</a>
            </div>
            @if (session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                </div>
            @endif
            <table class="table table-hover table-danger">
                <thead class="bg-dark text-white text-center">
                    <tr>
                        <th>Nama Bagian</th>
                        <th>Nama Supervisor</th>
                        <th>Jumlah Bagian</th>
                    </tr>
                </thead>
                <tbody class="text-center"> 
                        <tr>
                            <td>{{ $bagian->nama_bagian }}</td>
                            <td>{{ $bagian->nama_supervisor }}</td>
                            <td>{{ $bagian->jumlah_bagian }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

