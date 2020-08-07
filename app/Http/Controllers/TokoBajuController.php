<?php

namespace App\Http\Controllers;

use App\tokoBaju;
use Illuminate\Http\Request;
use App\Http\Requests\tokoBajuRequest;
use Illuminate\Support\Facades\Storage;

class TokoBajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = tokoBaju::all();
        return view('tokoBaju.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tokoBaju.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tokoBajuRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/tokoBaju', 'public');

        tokoBaju::create($data);
        return redirect()->route('tokoBaju.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tokoBaju  $tokoBaju
     * @return \Illuminate\Http\Response
     */
    public function show(tokoBaju $tokoBaju)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tokoBaju  $tokoBaju
     * @return \Illuminate\Http\Response
     */
    public function edit(tokoBaju $tokoBaju)
    {
        return view('tokoBaju.edit', compact('tokoBaju'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tokoBaju  $tokoBaju
     * @return \Illuminate\Http\Response
     */
    public function update(tokoBajuRequest $request, tokoBaju $tokoBaju)
    {
        // kondisi untuk mengedit beberapa antara nama/gambar
        $dataId = $tokoBaju->find($tokoBaju->id_toko);
        $data = $request->all();
        if ($request->foto) {
            Storage::delete('public/'.$dataId->foto);
            $data['foto'] = $request->file('foto')->store('assets/tokoBaju', 'public');
        }
        $dataId->update($data);
        return redirect()->route('tokoBaju.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tokoBaju  $tokoBaju
     * @return \Illuminate\Http\Response
     */
    public function destroy(tokoBaju $tokoBaju)
    {
        $tokoBaju->delete();
        Storage::delete('public/'.$tokoBaju->foto);
        return redirect()->route('tokoBaju.index')->with('pesan', "Hapus data $tokoBaju->nama_toko Berhasil");
    }
}
