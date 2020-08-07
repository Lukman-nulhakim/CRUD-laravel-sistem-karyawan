@extends('layouts.app')

@section('content')
    
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h1 mr-auto">Table Bagian</h1>
                @can('create', App\Bagian::class)
                    <a href="{{ url('/bagians/create') }}" class="btn btn-primary" >Tambah bagian</a>
                @endcan
            </div>
            @if (session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan') }}
                </div>
            @endif
            <table class="table table-hover table-info">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama Bagian</th>
                        <th>Nama Supervisor</th>
                        <th>Jumlah Bagian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($bagians as $bagian) 
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{-- login admin --}}
                                @can('view', $bagian)
                                    <a href="{{ url('/bagians/'.$bagian->id) }}">
                                    {{ $bagian->nama_bagian }}
                                    </a> 
                                @endcan
                                {{-- login user --}}
                                @cannot('view', $bagian)
                                    {{ $bagian->nama_bagian }}
                                @endcannot
                                
                            </td>
                            <td>{{ $bagian->nama_supervisor }}</td>
                            <td>{{ $bagian->jumlah_bagian }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('bagians.edit', ['bagian' => $bagian->id]) }}" class="btn btn-warning">Edit</a>
                                    @can('delete', $bagian)
                                        <form action="{{ route('bagians.destroy', ['bagian' => $bagian->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                        </form>
                                    @endcan
                                    
                                    <a href="{{ route('bagians.show', ['bagian' => $bagian->id]) }}" class="btn btn-info ml-2">Show</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center">Data kosong</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

