<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BIS extends Model
{
    use HasFactory;

    protected $table = 'bis'; // Pastikan nama tabelnya sesuai
    protected $primaryKey = 'id'; // Default Laravel 'id', tapi Anda pakai 'ID' di DB
                                  // Meskipun pakai DB::table(), ini good practice
    public $timestamps = false; // Karena tabel BIS tidak ada created_at dan updated_at
                                // Pastikan ini diatur agar Laravel tidak mencari kolom tersebut

    // Jika Anda ingin mengizinkan mass assignment, meskipun Query Builder tidak selalu memerlukannya
    // Ini lebih relevan jika Anda mulai menggunakan BIS::create() atau BIS::update()
    // protected $fillable = [
    //     'merkBIS',
    //     'hargaBIS',
    //     'tersedia',
    //     'berat',
    // ];
    // Atau
    // protected $guarded = []; // Untuk mengizinkan semua field
}
