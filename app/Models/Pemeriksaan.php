<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; // Menggunakan Database kedua
    protected $table = 'pemeriksaan'; // Nama Database kedua
    protected $fillable = ['id_pemeriksaan', 'bidang_p', 'jenis_p','sub_p', 'nilai_normal','satuan', 'tarif']; // Sesuaikan dengan kolom database
    public $timestamps = false;
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pemeriksaan');
    }
}


