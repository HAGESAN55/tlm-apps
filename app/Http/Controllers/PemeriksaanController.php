<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->input('perpage', 5);

        // Ambil data dengan pagination
        $pemeriksaan = Pemeriksaan::paginate($perpage);
   

        // Mengirim data ke view
        return view('pemeriksaan.index',  compact('pemeriksaan', 'perpage'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function addMetode()
    {
        return view('pemeriksaan.add');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bidang_p' => 'required',
            'jenis_p' => 'required',
            'sub_p' => 'required',
            'nilai_normal' => 'required',
            'satuan' => 'required',
            'tarif' => 'required',
        ]);
        $lastId = Pemeriksaan::max('id_pemeriksaan');
        $newId = $lastId + 1;

        Pemeriksaan::create(array_merge($request->all(), ['id_pemeriksaan' => $newId]));
        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil ditambahkan');
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
    public function edit($id_pemeriksaan)
    {
        $pemeriksaan = Pemeriksaan::where('id_pemeriksaan', $id_pemeriksaan)->first();
        // dd($pemeriksaan);

        return view('pemeriksaan.edit', compact('pemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeriksaan = Pemeriksaan::where('id_pemeriksaan',$id);
        // dd($pemeriksaan);
        $pemeriksaan->update([
            'bidang_p' => $request->bidang_p,
            'jenis_p' => $request->jenis_p,
            'sub_p' => $request->sub_p,
            'nilai_normal' => $request->nilai_normal,
            'satuan' => $request->satuan,
            'tarif' => $request->tarif,
        ]);

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemeriksaan = Pemeriksaan::where('id_pemeriksaan', $id);
        $pemeriksaan->delete();

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil dihapus');
    }
}
