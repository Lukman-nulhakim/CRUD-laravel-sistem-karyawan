<?php

namespace App\Http\Controllers;

use App\it;
use Illuminate\Http\Request;

class ItController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $its = it::all();
        return view('ptgaruda.it.index', compact('its'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptgaruda.it.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'nama_karyawan' => 'required|min:3|max:50',
        'alamat_karyawan' => '',
        'jenis_kelamin' => 'required|in:P,L',
        'bagian' => 'required',
        'gaji' => 'required'

        ]);

        it::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama_karyawan']} Berhasil Disimpan");
        return redirect()->route('its.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\it  $it
     * @return \Illuminate\Http\Response
     */
    public function show(it $it)
    {
        return view('ptgaruda.it.show', ['it' => $it]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\it  $it
     * @return \Illuminate\Http\Response
     */
    public function edit(it $it)
    {
        return view('ptgaruda.it.edit', ['it' => $it]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\it  $it
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, it $it)
    {
        $validatedData = $request->validate([
        'nama_karyawan' => 'required|min:3|max:50',
        'alamat_karyawan' => '',
        'jenis_kelamin' => 'required|in:P,L',
        'bagian' => 'required',
        'gaji' => 'required'
        ]);

        $it->update($validatedData);
        return redirect()->route('its.show',['it' => $it->id_it])->with('pesan', "Update data {$validatedData['nama_karyawan']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\it  $it
     * @return \Illuminate\Http\Response
     */
    public function destroy(it $it)
    {
        $it->delete();
        return redirect()->route('its.index')->with('pesan', "Hapus data $it->nama_karyawan Berhasil");
    }

}
