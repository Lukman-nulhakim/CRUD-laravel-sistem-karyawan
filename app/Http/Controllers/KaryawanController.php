<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Telepon;
use App\bagian;
use App\Hobi;

class KaryawanController extends Controller
{
    public function index(){
        $karyawans = Karyawan::all();
        return view('karyawan.index',  compact('karyawans'));
    }

    public function create(){
        $bagians = bagian::all();
        $daftar_hobi = Hobi::all();
        return view('karyawan.create', compact('bagians','daftar_hobi'));
    }

    public function show(Karyawan $Karyawan){ // cara Route model binding nge findOrfail otomatis
        return view ('karyawan.show', ['Karyawan' => $Karyawan]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
        'nik' => 'required|size:8|unique:karyawans', // contoh validasinya 11111111
        'nama' => 'required|min:3|max:50',
        'jenis_kelamin' => 'required|in:P,L',
        'bagian_id' => 'required',
        'alamat' => ''
        ]);

        $Karyawan = Karyawan::create($validatedData);
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $Karyawan->telepon()->save($telepon);
        $Karyawan->hobi()->attach($request->hobi);

        $request->session()->flash('pesan', "Data {$validatedData['nama']} Berhasil Disimpan");
        return redirect()->route('Karyawans.index');
    }

    public function edit(Karyawan $Karyawan){
        $daftar_hobi = Hobi::all();
        $bagians = bagian::all();
        $Karyawan->nomor_telepon = $Karyawan->telepon->nomor_telepon;
        return view('karyawan.edit', compact('Karyawan','bagians','daftar_hobi'));
    }

    public function update(Request $request, Karyawan $Karyawan){
        $validatedData = $request->validate([
        'nik' => 'required|size:8|unique:karyawans,nik,'.$Karyawan->id, // ketika nik sama itu muncul validasi
        'nama' => 'required|min:3|max:50',
        'jenis_kelamin' => 'required|in:P,L',
        'bagian_id' => 'required',
        'alamat' => ''
        ]);
        
        $Karyawan->update($validatedData);
        $telepon = $Karyawan->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $Karyawan->telepon()->save($telepon);
        $Karyawan->hobi()->sync($request->hobi);

        return redirect()->route('Karyawans.show',['Karyawan' => $Karyawan->id])->with('pesan', "Update data {$validatedData['nama']} Berhasil");
    }

    public function destroy(Karyawan $Karyawan){
        $Karyawan->delete();
        return redirect()->route('Karyawans.index')->with('pesan', "Hapus data $Karyawan->nama Berhasil");
    }

}
