<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewKaryawanController extends Controller
{


    public function index()
    {

        $newkaryawan = DB::table('newkaryawan')->get();


        return view('index2newkaryawan', ['newkaryawan' => $newkaryawan]);
    }


    public function tambah()
    {

        return view('tambahnewkaryawan');
    }


    public function store(Request $request) // <--- METHOD INI
    {

        $request->validate([
            'NIP' => 'required|size:5|unique:newkaryawan,NIP', // size:5 untuk panjang tepat 5
            'NamaKaryawan' => 'required|string|max:50',
            'Pangkat' => 'required|string', // size:5 untuk panjang tepat 5
            'Gaji' => 'required|string|max:10',
        ]);

        // insert data ke table karyawan
        DB::table('newkaryawan')->insert([
            'NIP' => $request->NIP, // Umumnya kode dibuat UPPERCASE
            'NamaKaryawan' => strtoupper($request->NamaKaryawan), // Sesuai permintaan "huruf kapital semua"
            'Pangkat' => $request->Pangkat, // Divisi tidak ada permintaan khusus case, sesuaikan kebutuhan
            'Gaji' => strtolower($request->Gaji) // agar lowercase
        ]);

        // alihkan halaman ke halaman index karyawan dengan pesan sukses (opsional)
        return redirect('/newkaryawan')->with('success', 'Data karyawan berhasil ditambahkan!');
    }


    // 3. Fungsi Tombol Hapus Data yang akan menghapus record terpilih dari tabel
    public function hapus($NIP) // Pastikan nama parameter sesuai dengan primary key
    {
        // menghapus data karyawan berdasarkan NIP yang dipilih
        DB::table('newkaryawan')->where('NIP', $NIP)->delete();

        // alihkan halaman ke halaman karyawan dengan pesan sukses (opsional)
        return redirect('/newkaryawan')->with('success', 'Data karyawan berhasil dihapus!');
    }

    // Catatan: Soal tidak meminta fitur Edit dan Search, jadi tidak disertakan method-nya.
}
