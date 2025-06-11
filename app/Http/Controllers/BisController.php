<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan ini di-import karena kita akan pakai Query Builder

class BisController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel 'bis' dengan pagination
        $bis = DB::table('bis')->paginate(5); // Menampilkan 5 data per halaman

        // Mengirim data BIS ke view index2vga
        return view('index2bis', ['bis' => $bis]);
    }

    // Method untuk menampilkan view form tambah BIS
    public function tambah()
    {
        // Memanggil view tambahbis
        return view('tambahbis');
    }

    // Method untuk insert data ke table BIS
    public function store(Request $request)
    {
        // Validasi input (sangat disarankan tetap ada)
        $request->validate([
            'merkBIS' => 'required|string|max:25',
            'hargaBIS' => 'required|integer|min:0',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric|min:0',
        ]);

        // Insert data ke tabel 'bis' menggunakan Query Builder
        DB::table('bis')->insert([
            'merkBIS' => $request->merkBIS,
            'hargaBIS' => $request->hargaBIS,
            'tersedia' => $request->tersedia, // Laravel akan mengonversi boolean ke 0/1 untuk DB
            'berat' => $request->berat
        ]);

        // Alihkan halaman ke halaman BIS dengan pesan sukses
        return redirect('/bis')->with('success', 'Data BIS berhasil ditambahkan!');
    }

    // Method untuk edit data BIS
    public function edit($id)
    {
        // Mengambil data BIS berdasarkan ID yang dipilih menggunakan Query Builder
        $bis = DB::table('bis')->where('ID', $id)->get(); // 'ID' adalah primary key tabel VGA

        // Passing data BIS yang didapat ke view editvga.blade.php
        // Karena get() mengembalikan koleksi, kita ambil elemen pertamanya ([0])
        // agar di view bisa langsung `$bis->properti` tanpa foreach
        return view('editbis', ['vga' => $bis[0]]);
    }

    // Update data BIS
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'merkBIS' => 'required|string|max:25',
            'hargaBIS' => 'required|integer|min:0',
            'tersedia' => 'required|boolean',
            'berat' => 'required|numeric|min:0',
        ]);

        // Update data BIS menggunakan Query Builder
        DB::table('bis')->where('ID', $request->ID)->update([ // 'ID' adalah primary key dari form hidden
            'merkBIS' => $request->merkBIS,
            'hargaBIS' => $request->hargaBIS,
            'tersedia' => $request->tersedia,
            'berat' => $request->berat
        ]);

        // Alihkan halaman ke halaman BIS dengan pesan sukses
        return redirect('/bis')->with('success', 'Data BIS berhasil diperbarui!');
    }

    // Method untuk hapus data BIS
    public function hapus($id)
    {
        // Menghapus data BIS berdasarkan ID yang dipilih menggunakan Query Builder
        DB::table('BIS')->where('ID', $id)->delete(); // 'ID' adalah primary key tabel BIS

        // Alihkan halaman ke halaman BIS dengan pesan sukses
        return redirect('/bis')->with('success', 'Data BIS berhasil dihapus!');
    }

    // Mencari data BIS
    public function cari(Request $request)
    {
        // Menangkap data pencarian
        $cari = $request->cari;

        // Mengambil data dari tabel 'bis' sesuai pencarian data menggunakan Query Builder
        $bis = DB::table('bis')
            ->where('merkBIS', 'like', "%" . $cari . "%")
            ->orWhere('ID', 'like', "%" . $cari . "%") // Tambahkan pencarian berdasarkan ID juga
            ->paginate(5); // Pagination untuk hasil pencarian

        // Mengirim data BIS ke view index2bis
        return view('index2bis', ['bis' => $bis, 'cari' => $cari]);
    }
}
