<?php
  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  
  class Kat extends Model {
      use HasFactory;

      protected $connection = 'mysql2'; // Menggunakan database kedua
      protected $table = 'kategori'; // Pastikan nama tabel sesuai di database
      protected $fillable = ['id_kategori', 'kategori']; // Sesuaikan dengan kolom database
  }
  