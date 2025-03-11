<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
      $perpage = $request->input('perpage', 10); // Default 10 jika tidak ada input
      
      $transaksi = Transaksi::paginate($perpage);

      session(['perpage' => $perpage]);
      
      return view('transaksi.index', compact('transaksi', 'perpage'));
    }


}
