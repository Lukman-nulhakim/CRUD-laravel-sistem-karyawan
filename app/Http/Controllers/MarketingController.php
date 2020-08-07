<?php

namespace App\Http\Controllers;

use App\marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketings = marketing::all();
        return view('ptgaruda.marketing.index',  compact('marketings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptgaruda.marketing.create');
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
        'gaji' => 'required',
        'jobdesk' => 'required'
        ]);

        marketing::create($validatedData);
        $request->session()->flash('pesan', "Data {$validatedData['nama_karyawan']} Berhasil Disimpan");
        return redirect()->route('marketings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(marketing $marketing)
    {
        return view ('ptgaruda.marketing.show', ['marketing' => $marketing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function edit(marketing $marketing)
    {
        return view('ptgaruda.marketing.edit', ['marketing' => $marketing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marketing $marketing)
    {
        $validatedData = $request->validate([
        'nama_karyawan' => 'required|min:3|max:50',
        'alamat_karyawan' => '',
        'jenis_kelamin' => 'required|in:P,L',
        'gaji' => 'required',
        'jobdesk' => 'required'
        ]);

        $marketing->update($validatedData);
        return redirect()->route('marketings.show',['marketing' => $marketing->id])->with('pesan', "Update data {$validatedData['nama_karyawan']} Berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(marketing $marketing)
    {
        $marketing->delete();
        return redirect()->route('marketings.index')->with('pesan', "Hapus data $marketing->nama_karyawan Berhasil");
    }
}
