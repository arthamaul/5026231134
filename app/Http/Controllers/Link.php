<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Link extends Controller
{
    //
    public function helloword()
    {
        return view('blog');
    }

    public function index(){
        $nama = "Artha Maulana";
        $umur = 20;
        $alamat = "Surabaya";
        $pelajaran = ["Algoritma & Pemrograman","Kalkulus","Pemrograman Web"];
    	return view('biodata', ['nama' => $nama, 'usia' => $umur, 'alamat' => $alamat, 'matkul' => $pelajaran]);
    }
}