<?php
  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  
  class Admin extends Model {
      use HasFactory;

      protected $connection = 'mysql2'; // Menggunakan database kedua
      protected $table = 'petugas'; // Pastikan nama tabel sesuai di database
      protected $fillable = ['id_petugas', 'password','nama_petugas', 'username', 'repassword', 'jenis_kelamin','agama','telepon', 'alamat']; // Sesuaikan dengan kolom database
      protected $hidden = ['password',];
    }
  