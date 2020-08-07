<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indomaret;

class IndomaretController extends Controller
{
    public function index(){
        $indomarets = Indomaret::all();
        return view('indomaret.index',  compact('indomarets'));
    }

    public function create(){
        return view('indomaret.create');
    }

    public function show(Indomaret $indomaret){
        return view ('indomaret.show', ['indomaret' => $indomaret]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
        'nama_produk' => 'required|min:3|max:50',
        'jenis_produk' => 'required|min:3|max:15',
        'penjaga_toko' => 'required|in:P,L',
        'harga_produk' => ''
        ]);
        
        Indomaret::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama_produk']} Berhasil Disimpan");
        return redirect()->route('indomarets.index');
    }

    public function edit(Indomaret $indomaret){
        return view('indomaret.edit', ['indomaret' => $indomaret]);
    }

    public function update(Request $request, Indomaret $indomaret){
        $validatedData = $request->validate([
        'nama_produk' => 'required|min:3|max:50',
        'jenis_produk' => 'required|min:3|max:15',
        'penjaga_toko' => 'required|in:P,L',
        'harga_produk' => ''
        ]);
        $indomaret->update($validatedData);
        return redirect()->route('indomarets.show',['indomaret' => $indomaret->id_produk])->with('pesan', "Update data {$validatedData['nama_produk']} Berhasil");
    }

    public function destroy(Indomaret $indomaret){
        $indomaret->delete();
        return redirect()->route('indomarets.index')->with('pesan', "Hapus data $indomaret->nama_produk Berhasil");
    }
}
