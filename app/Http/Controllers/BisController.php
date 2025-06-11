<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan ini ada
// use App\Models\BIS; // Ini tidak diperlukan jika semua pakai DB::table()

class BisController extends Controller
{
    public function index()
    {
        // mengambil data dari table BIS dengan pagination
        $bis = DB::table('bis')->paginate(5); // 5 data per halaman

        // mengirim data BIS ke view index2bis
        return view('index2bis', ['bis' => $bis]);
    }

    // method untuk menampilkan view form tambah BIS
    public function tambah()
    {
        // memanggil view vga_tambah
        return view('tambahbis');
    }

    // method untuk insert data ke table BIS
    public function store(Request $request)
    {
        // Validasi input (penting walaupun pakai DB::table)
        $request->validate([
            'merkBIS' => 'required|string|max:25',
            'hargaBIS' => 'required|integer|min:0',
            'tersedia' => 'required|boolean', // Pastikan input ini mengirim 0 atau 1
            'berat' => 'required|numeric|min:0',
        ]);

        // insert data ke table BIS
        DB::table('bis')->insert([
            'merkBIS' => $request->merkBIS,
            'hargaBIS' => $request->hargaBIS,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);
        // alihkan halaman ke halaman BIS
        return redirect('/bis')->with('success', 'Data BIS berhasil ditambahkan!');
    }

    // method untuk edit data BIS
    public function edit($id)
    {
        // mengambil data BIS berdasarkan id yang dipilih
        $vga = DB::table('bis')->where('ID', $id)->get(); // Kolom ID bukan id
        // passing data BIS yang didapat ke view bis_edit.blade.php
        return view('editbis', ['bis' => $bis]); // Ambil elemen pertama dari koleksi karena get() mengembalikan koleksi
    }

    // update data BIS
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'merkBIS' => 'required|string|max:25',
            'hargaBIS' => 'required|integer|min:0',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric|min:0',
        ]);

        // update data BIS
        DB::table('bis')->where('ID', $request->ID)->update([ // Kolom ID bukan id
            'merkBIS' => $request->merkBIS,
            'hargaBIS' => $request->hargaBIS,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);
        // alihkan halaman ke halaman BIS
        return redirect('/bis')->with('success', 'Data BIS berhasil diperbarui!');
    }

    // method untuk hapus data BIS
    public function hapus($id)
    {
        // menghapus data BIS berdasarkan id yang dipilih
        DB::table('bis')->where('ID', $id)->delete(); // Kolom ID bukan id

        // alihkan halaman ke halaman BIS
        return redirect('/bis')->with('success', 'Data BIS berhasil dihapus!');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table BIS sesuai pencarian data
        $vga = DB::table('bis')
            ->where('merkBIS', 'like', "%" . $cari . "%")
            ->orWhere('ID', 'like', "%" . $cari . "%") // Tambahkan pencarian berdasarkan ID juga
            ->paginate(5); // Pagination untuk hasil pencarian

        // mengirim data BIS ke view index2vga
        return view('index2bis', ['bis' => $bis, 'cari' => $cari]);
    }
}
