<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Link;
use App\Http\Controllers\Pegawai2Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('bootstrap1', function () {
    return view('bootstrap1');
});

Route::get('index', function () {
    return view('index');
});

Route::get('pertama', function () {
    return view('pertama');
});

Route::get('PERTEMUAN4', function () {
    return view('PERTEMUAN4');
});

Route::get('pseudo-elements&grid counter', function () {
    return view('pseudo-elements&grid counter');
});

Route::get('frontend', function () {
    return view('frontend');
});

Route::get('dosen', [Link::class, 'index'] );

//Route::get('/pegawai/{nama}', [Pegawai2Controller::class, 'index'] );

Route::get('/formulir', [PegawaiController::class,'formulir'] );
Route::post('/formulir/proses', [PegawaiController::class,'proses'] );

// route blog
Route::get('/blog' , [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

//crud
Route::get('/pegawai', [PegawaiController::class, 'index'] );
