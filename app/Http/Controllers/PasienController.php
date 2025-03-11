<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Kat;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data pasien
        $pasien = Pasien::with('dokter', 'kateg')->get();

        // Menampilkan data pasien ke view
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.register', [
            'kode_registrasi' => $this->generateKodeRegistrasi(),
            'dokter' => Dokter::all(),
            'kategori' => Kat::all()

        ]);
    }

    // Menyimpan Data Pasien ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'id_dokter' => 'required',
            'goldar' => 'required',
            'status_menikah' => 'required',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_regis' => 'required|date',
            'id_kategori' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|string|max:15',
            'no_kk' => 'nullable|string|max:20',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.manage.index')->with('success', 'Registrasi berhasil!');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Hapus data
        $pasien->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    // Generate kode registrasi otomatis
    private function generateKodeRegistrasi()
    {
        $lastPasien = Pasien::latest()->first();
        $nextNumber = $lastPasien ? ((int) substr($lastPasien->kd_reg, -11) + 1) : 1;
        return 'RM' . str_pad($nextNumber, -11, '0', STR_PAD_LEFT);
    }
}
