<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index(){
        echo "<ul>";
            echo '<li><a href=/buat-session>Buat Session</a></li>';
            echo '<li><a href=/akses-session>Akses Session</a></li>';
            echo '<li><a href=/hapus-session>Hapus Session</a></li>';
            echo '<li><a href=/flash-session>Flash Session</a></li>';
        echo "</ul>";
    }

    public function buatSession(){
        
        // Rumus
        // menggunakan cara function helper
        // session (<sessio_nama>,<session_value);
        // menggunkan method :
        // $request->session()->put(<session_nama>, <session_value>)
        // menggunakan object :
        // Session::put(<session_nama>,<session_value>) -> session facade

        session(['hakAkses' => 'admin', 'nama' => 'Lukman']);
        return "session sudah dibuat";
    }

    public function aksesSession(Request $request){
        // // menggunakan helper function
        // echo session('hakAkses');
        // echo session('nama');
        // echo "<hr>";

        // // Dari request method
        // echo $request->session()->get('hakAkses');
        // echo $request->session()->get('nama');
        // echo "<hr>";
        
        // // menggunakan facade
        // echo Session::get('hakAkses');
        // echo Session::get('nama');

        if(session()->has('hakAkses')){
            echo "Session 'hakAkses' terdeteksi : ".session('hakAkses');
        }
    }
    
    public function hapusSession(Request $request){
        // menghapus 1 session menggunakan helper function
        session()->forget('hakAkses');

        // menghapus 1 session menggunakan Request Object
        $request->session()->forget('hakAkses');

        // menghapus 1 session menggunakan facade session
        Session::forget('hakAkses');
        echo "session telah di hapus";
    }

    public function flashSession(Request $request){
        //' menghapus 1 flash session menggunakan helper function
        session()->flash('hakAkses','admin');

        // menghapus 1 flash session menggunakan Request
        $request->session()->flash('hakAkses','admin');

        // menghapus 1 flash session menggunakan facede session
        Session::flash('hakAkses','admin');
        echo "Flash session hakAkses sudah dihapus";
    }
}
