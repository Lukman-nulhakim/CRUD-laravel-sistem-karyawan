<?php

namespace App\Http\Controllers;

use App\Ktp;
use Illuminate\Http\Request;
use App\Http\Requests\KtpRequest;
use Illuminate\Support\Facades\Storage;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Ktp::all();
        return view('ktp.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ktp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KtpRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/ktp', 'public');

        Ktp::create($data);
        return redirect()->route('ktp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function show(Ktp $ktp)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function edit(Ktp $ktp)
    {
        return view('ktp.edit', compact('ktp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function update(KtpRequest $request, Ktp $ktp)
    {
        // kondisi untuk mengedit beberapa antara nama/gambar
        $dataId = $ktp->find($ktp->id);
        $data = $request->all();
        if ($request->foto) {
            Storage::delete('public/'.$dataId->foto);
            $data['foto'] = $request->file('foto')->store('assets/ktp', 'public');
        }
        $dataId->update($data);
        return redirect()->route('ktp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ktp  $ktp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ktp $ktp)
    {
        // $data = $ktp->all();
        $ktp->delete();
        Storage::delete('public/'.$ktp->foto);
        return redirect()->route('ktp.index')->with('pesan', "Hapus data $ktp->nama Berhasil");
    }
}
