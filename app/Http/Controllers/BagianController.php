<?php

namespace App\Http\Controllers;

use App\bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagians = bagian::all();
        return view('bagian.index', compact('bagians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // hak akses untuk proses simpan
        $this->authorize('create', Bagian::class);

        return view('bagian.create');
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
            'nama_bagian' => 'required',
            'nama_supervisor' => 'required',
            'jumlah_bagian' => 'required|min:10|integer'
        ]);
        bagian::create($validatedData);
        return redirect('/')->with('pesan', "Bagian $request->nama_bagian Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function show(bagian $bagian)
    {
        return view('bagian.show', compact('bagian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function edit(bagian $bagian)
    {
        return view('bagian.edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bagian $bagian)
    {
        $validatedData = $request->validate([
            'nama_bagian' => 'required',
            'nama_supervisor' => 'required',
            'jumlah_bagian' => 'required|min:10|integer'
        ]);

        $bagian->update($validatedData);
        return redirect('/bagians/'.$bagian->id)->with('pesan',"Bagian $bagian->nama_bagian berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bagian  $bagian
     * @return \Illuminate\Http\Response
     */
    public function destroy(bagian $bagian)
    {
        // hak akses untuk proses simpan
        $this->authorize('delete', $bagian);

        $bagian->delete();
        return redirect('/')->with('pesan', "Bagian $bagian->nama_bagian berhasil dihapus");
    }
}
