<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $dokter = Dokter::all();
        return view('dokter.index', compact('dokter'));
    }
}
