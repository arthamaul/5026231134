<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangBelanjaController extends Controller
{

    public function index()
    {
        $keranjangbelanja = DB::table('keranjangbelanja')->get();

        return view('index2keranjangbelanja', ['keranjangbelanja' => $keranjangbelanja]);
    }

    public function tambah()
    {
        return view('tambahkeranjangbelanja');
    }

    public function store(Request $request)
    {

        DB::table('keranjangbelanja')->insert([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga
        ]);

        return redirect('/keranjangbelanja')->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }


    public function hapus($id)
    {
        DB::table('keranjangbelanja')->where('ID', $id)->delete();

        return redirect('/keranjangbelanja')->with('success', 'Item berhasil dibatalkan dari keranjang!');
    }

}
