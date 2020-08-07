<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        // if($request->hasFile('berkas')){
        //     echo "path() : ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension() : ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalName() : ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getMimeType() : ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalExtension() : ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getSize() : ".$request->berkas->getSize();
        // } else {
        //     echo "tidak ada file yg diupload";
        // }

        $request->validate([
            'berkas' => 'required|file|max:1000'
        ]);

        $path = $request->berkas->store('uploads');
        echo "Proses update berhasil, file berada di : $path";
    }

    public function prosesFileUploadRename(Request $request){
        $request->validate([
            'nama_gambar' => 'required|min:5',
            'gambar_profile' => 'required|file|image|max:1000'
        ]);
            // ambil nama extension awal
        $extFile = $request->gambar_profile->getClientOriginalExtension();
            // generate nama file akhir, diambil dari inputan nama_gambar + extension
        $namaFile = $request->nama_gambar.".".$extFile;
            //pindahkan file upload ke folder storage/app/public/gambar
        $request->gambar_profile->storeAs('public/gambar',$namaFile);
            // generate path gambar yg bisa diakses (path di folder public)
        $pathPublic = asset('storage/gambar/'.$namaFile);
        echo "Gambar berhasil diupload ke <a href=".$pathPublic.">$namaFile</a>";
        echo "<br>";
        echo "<img src=".$pathPublic." width='200px'>";

    }

    public function fileUploadRename(){
        return view('file-upload-rename');
    }
}
