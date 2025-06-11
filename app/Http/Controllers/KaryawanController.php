<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // WAJIB ada ini untuk Query Builder

class KaryawanController extends Controller
{
    // 3. Buatlah halaman Index untuk melihat seluruh record di tabel "karyawan"
    public function index()
    {
        // mengambil data dari table karyawan
        // Soal tidak menyebutkan pagination, jadi kita pakai get()
        $karyawan = DB::table('karyawan')->get();

        // mengirim data karyawan ke view karyawan_index
        return view('index2karyawan', ['karyawan' => $karyawan]);
    }

    // 3. Buatlah halaman Tambah Data dengan bentuk layout Horizontal Form.
    public function tambah()
    {
        // memanggil view karyawan_tambah
        return view('tambahkaryawan');
    }

    // METHOD INI HILANG, PERLU DITAMBAHKAN KEMBALI
    // method untuk insert data ke table karyawan
    // Setelah mengisi record baru dan klik SIMPAN, langsung redirect ke Halaman Index.
    public function store(Request $request) // <--- METHOD INI
    {
        // Validasi input (SANGAT disarankan untuk tetap ada, meskipun Anda menghapusnya sebelumnya)
        // Saya menyertakannya kembali di sini sebagai praktik terbaik.
        // Jika Anda benar-benar tidak ingin validasi, Anda bisa menghapus blok validate ini.
        $request->validate([
            'kodepegawai' => 'required|size:5|unique:karyawan,kodepegawai', // size:5 untuk panjang tepat 5
            'namalengkap' => 'required|string|max:50',
            'divisi' => 'required|string', // size:5 untuk panjang tepat 5
            'departemen' => 'required|string|max:10',
        ]);

        // insert data ke table karyawan
        DB::table('karyawan')->insert([
            'kodepegawai' => $request->kodepegawai, // Umumnya kode dibuat UPPERCASE
            'namalengkap' => strtoupper($request->namalengkap), // Sesuai permintaan "huruf kapital semua"
            'divisi' => $request->divisi, // Divisi tidak ada permintaan khusus case, sesuaikan kebutuhan
            'departemen' => strtolower($request->departemen) // agar lowercase
        ]);

        // alihkan halaman ke halaman index karyawan dengan pesan sukses (opsional)
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
    }


    // 3. Fungsi Tombol Hapus Data yang akan menghapus record terpilih dari tabel
    public function hapus($kodepegawai) // Pastikan nama parameter sesuai dengan primary key
    {
        // menghapus data karyawan berdasarkan kodepegawai yang dipilih
        DB::table('karyawan')->where('kodepegawai', $kodepegawai)->delete();

        // alihkan halaman ke halaman karyawan dengan pesan sukses (opsional)
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus!');
    }

    // Catatan: Soal tidak meminta fitur Edit dan Search, jadi tidak disertakan method-nya.
}
