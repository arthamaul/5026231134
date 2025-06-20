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


public function store(Request $request)
{
    $request->validate([
        'NIP' => 'required|size:5|unique:newkaryawan,NIP',
        'NamaKaryawan' => 'required|string|max:50',
        'Pangkat' => 'required|string|max:15',
        'Gaji' => 'required|integer|min:0|max:9999999999',
    ]);

    DB::table('newkaryawan')->insert([
        'NIP' => $request->NIP,
        'NamaKaryawan' => strtoupper($request->NamaKaryawan),
        'Pangkat' => $request->Pangkat,
        'Gaji' => $request->Gaji,
    ]);

    return redirect('/eas')->with('success', 'Data karyawan berhasil ditambahkan!');
}

    // 3. Fungsi Tombol Hapus Data yang akan menghapus record terpilih dari tabel
    public function hapus($NIP) // Pastikan nama parameter sesuai dengan primary key
    {
        // menghapus data karyawan berdasarkan NIP yang dipilih
        DB::table('newkaryawan')->where('NIP', $NIP)->delete();

        // alihkan halaman ke halaman karyawan dengan pesan sukses (opsional)
        return redirect('/eas')->with('success', 'Data karyawan berhasil dihapus!');
    }

    // Catatan: Soal tidak meminta fitur Edit dan Search, jadi tidak disertakan method-nya.
}
