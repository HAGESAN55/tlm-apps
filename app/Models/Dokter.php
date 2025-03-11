<?php
  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  
  class Dokter extends Model {
      use HasFactory;

      protected $connection = 'mysql2'; // Menggunakan database kedua
      protected $table = 'dokter'; // Pastikan nama tabel sesuai di database
      protected $fillable = ['id_dokter', 'nama_dokter']; // Sesuaikan dengan kolom database
  }
  