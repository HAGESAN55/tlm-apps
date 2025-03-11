<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mysql2'; // Koneksi ke database kedua
    protected $table = 'admin'; // Nama tabel
    protected $primaryKey = 'id_admin';
    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
