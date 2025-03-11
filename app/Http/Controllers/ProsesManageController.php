<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Dokter;
use App\Models\Kat;
use App\Models\Pasien;
use App\Models\Transaksi;

class ProsesManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $pemeriksaan_2 = Pasien::with('dokter', 'kateg')->get();
        // Mengirim data ke view
    //     return view('pemeriksaan.proses',  [            
    //     // 'kode_registrasi' => $this->generateKodeRegistrasi(),
    //     'dokter' => Dokter::all(),
    //     'kategori' => Kat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemeriksaan.proses', [
            'kode_registrasi' => $this->generateKodeRegistrasi(),
            'dokter' => Dokter::all(),
            'kategori' => Kat::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemeriksaan' => 'required',
            'hasil' => 'required|string|max:255',
            'status'=>'required'
        ]);
        $kd_reg = $request->kd_reg;
        Transaksi::create($request->all());

        return redirect()->route('pemeriksaan.proses', ['id' => $kd_reg]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kd_reg)
    {
      $pemeriksaan = Pemeriksaan::all();
      $pasien = Pasien::findOrFail($kd_reg);
      $dokter = Dokter::all();
      $kateg = Kat::all();
      $transaksi = Transaksi::where('kd_reg', $kd_reg)->with(['pasien', 'pemeriksaan'])->get();
      $total = Transaksi::where('kd_reg', $kd_reg)->sum('biaya');
      return view('pemeriksaan.proses', compact('pasien', 'dokter', 'kateg', 'transaksi', 'pemeriksaan', 'total'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'bayar' => 'required|numeric'
        ]);
    
        // Ambil data pemeriksaan berdasarkan kd_reg

        $total = Transaksi::where('kd_reg', $request->kd_reg)->sum('biaya');
        Transaksi::where('kd_reg', $request->kd_reg)->update([
            'uang_bayar' => $request->bayar,
            'uang_kembali' => $request->bayar - $total,
            'status' => '1'
        ]);
        return redirect()->route('pemeriksaan.proses', ['id' => $request->kd_reg]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
                // Cari data berdasarkan ID
                $transaksi = Transaksi::findOrFail($id);
                
                // Hapus data
                $transaksi->delete();
        
                // Redirect ke halaman sebelumnya dengan pesan sukses
                return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    private function generateKodeRegistrasi()
    {
        $lastPasien = Pasien::latest()->first();
        $nextNumber = $lastPasien ? ((int) substr($lastPasien->kd_reg, -11) + 1) : 1;
        return 'RM' . str_pad($nextNumber, -11, '0', STR_PAD_LEFT);
    }

}
