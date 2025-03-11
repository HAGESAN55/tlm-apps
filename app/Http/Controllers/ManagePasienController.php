<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Kat;
use App\Models\Admin;

class ManagePasienController extends Controller 
{
  public function index(Request $request)
  {
    $managePas = Pasien::with('dokter', 'kateg', 'petugas')->get();

    return view('pasien.manage.index', compact('managePas'));
  }
}