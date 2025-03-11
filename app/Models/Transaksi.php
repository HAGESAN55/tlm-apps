<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; // Menggunakan Database kedua
    protected $table = 'transaksi'; // Nama Database kedua
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id_transaksi', 'id_pemeriksaan', 'kd_reg','hasil', 'biaya','uang_bayar', 'uang_kembali', 'status']; // Sesuaikan dengan kolom database

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'kd_reg');
    }

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }
}
