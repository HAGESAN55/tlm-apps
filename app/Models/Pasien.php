<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; // Menggunakan Database kedua
    protected $table = 'pasien'; // Nama Database kedua
    protected $primaryKey = 'kd_reg';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['kd_reg', 'nama_pasien', 'id_dokter','goldar', 'status_menikah',
                'pekerjaan', 'nama_ayah', 'alamat',"tgl_regis", 'id_kategori', 'jenis_kelamin', 
                'tgl_lahir', 'telepon', 'no_kk', 'nama_ayah', 'nama_ibu', 'id_petugas', 'status_pembayaran']; // Sesuaikan dengan kolom database
    
    // Mengambil inheritance dokter 
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function kateg()
    {
        return $this->belongsTo(Kat::class, 'id_kategori', 'id_kategori');
    }
    public function petugas()
    {
        return $this->belongsTo(Admin::class, 'id_petugas', 'id_petugas');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'kg_reg');
    }
}
