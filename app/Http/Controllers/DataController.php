<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct(){
        $this->middleware('data');
    }

    public function daftarKaryawan(){
        return 'From Karyawan';
    }

    public function tabelKaryawan(){
        return 'Tabel data keryawan';
    }

    public function blogKaryawan(){
        return 'Halaman Blog Karyawan';
    }
}
