<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Dokter;
use App\Models\Kat;
use App\Models\Pasien;
use App\Models\Transaksi;

class PrintController extends Controller
{
    public function print_hasil(Request $request)
    {
        $pemeriksaan = Pemeriksaan::all();
        $dokter = Dokter::all();
        $kateg = Kat::all();
        $pasien = Pasien::with('dokter', 'kateg')->findOrFail($request->kd_reg);
        $transaksi = Transaksi::where('kd_reg', $request->kd_reg)->with(['pasien', 'pemeriksaan'])->get();
        // dd($pasien);
        // $total = Transaksi::where('kd_reg', $kd_reg)->sum('biaya');
        // Return view yang akan dicetak
        return view('print.hasil', compact('pasien', 'transaksi'));
    }

    public function print_kwitansi(Request $request)
    {
      $pasien = Pasien::with('dokter', 'kateg')->findOrFail($request->kd_reg);
      $transaksi = Transaksi::where('kd_reg', $request->kd_reg)->with(['pasien', 'pemeriksaan'])->get();
      $total = Transaksi::where('kd_reg', $request->kd_reg)->sum('biaya');
      // dd($pasien);

      return view('print.kwitansi',  compact('pasien', 'transaksi', 'total'));
    }
}