<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Link;
use App\Http\Controllers\Pegawai2Controller;
use App\Http\Controllers\BisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KeranjangBelanjaController;
use App\Http\Controllers\NewKaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// import java.io :
// System.out.println() :


Route::get('/', function () {
    return view('frontend');
});


Route::get('/index', function () {
    return view('index');
});

Route::get('/js1', function () {
    return view('js1');
});

Route::get('/js2', function () {
    return view('js2');
});

Route::get('/bootstrap', function () {
    return view('bootstrap');
});

Route::get('/latihanlayout', function () {
    return view('latihanlayout');
});

Route::get('/linktree', function () {
    return view('linktree');
});

Route::get('/pertama', function () {
    return view('pertama');
});

Route::get('/welcome.blade', function () {
    return view('welcome.blade');
});

Route::get('/biodata.blade', function () {
    return view('biodata.blade');
});

Route::get('/dosen', [Link::class,'index']);
// Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

// route blog
Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class,'kontak']);

// crud pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class,'tambah'] );
Route::post('/pegawai/store', [PegawaiController::class,'store'] );
Route::get('/pegawai/edit/{id}', [PegawaiController::class,'edit'] );
Route::post('/pegawai/update', [PegawaiController::class,'update'] );
Route::get('/pegawai/hapus/{id}', [PegawaiController::class,'hapus'] );
Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);

// route bis
Route::get('/bis', [BisController::class, 'index']);            // Menampilkan daftar BIS
Route::get('/bis/tambah', [BisController::class, 'tambah']);    // Menampilkan form tambah
Route::post('/bis/store', [BisController::class, 'store']);    // Menyimpan data baru
Route::get('/bis/edit/{id}', [BisController::class, 'edit']);  // Menampilkan form edit
Route::post('/bis/update', [BisController::class, 'update']);  // Memperbarui data
Route::get('/bis/hapus/{id}', [BisController::class, 'hapus']); // Menghapus data
Route::get('/bis/cari', [BisController::class, 'cari']);       // Mencari data BIS

//crud karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/hapus/{kodepegawai}', [KaryawanController::class, 'hapus']); // Parameter harus 'kodepegawai'

//crud keranjangbelanja
Route::get('/keranjangbelanja', [KeranjangBelanjaController::class, 'index']);
Route::get('/keranjangbelanja/tambah', [KeranjangBelanjaController::class, 'tambah']);
Route::post('/keranjangbelanja/store', [KeranjangBelanjaController::class, 'store']);
Route::get('/keranjangbelanja/hapus/{id}', [KeranjangBelanjaController::class, 'hapus']);

//crud NewKaryawanController
Route::get('/eas', [NewKaryawanController::class, 'index']);
Route::get('/eas/tambah', [NewKaryawanController::class, 'tambah']);
Route::post('/eas/store', [NewKaryawanController::class, 'store']);
Route::get('/eas/hapus/{NIP}', [NewKaryawanController::class, 'hapus']);
