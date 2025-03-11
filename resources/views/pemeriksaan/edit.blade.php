@extends('layouts.main')

@section('content')

<div class="container mx-auto p-4">

  <h1 class="text-2xl font-bold mb-4">Edit Metode Pemeriksaan</h1>
  <hr>

  <form action="{{ route('periksa.update', $pemeriksaan->id_pemeriksaan) }}" method="POST" class="space-y-4" id='edit-form'>
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="bidang_p">Bidang Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="bidang_p" name="bidang_p" value="{{ $pemeriksaan->bidang_p }}" required>
    </div>

    <div class="form-group">
      <label for="jenis_p">Jenis Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="jenis_p" name="jenis_p" value="{{ $pemeriksaan->jenis_p }}" required>
    </div>

    <div class="form-group">
      <label for="sub_p">Sub Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="sub_p" name="sub_p" value="{{ $pemeriksaan->sub_p }}" required>
    </div>

    <div class="form-group">
      <label for="nilai_normal">Nilai Normal</label>
      <input type="text" class="border p-2 w-full" id="nilai_normal" name="nilai_normal" value="{{ $pemeriksaan->nilai_normal }}" required>
    </div>

    <div class="form-group">
      <label for="satuan">Satuan</label>
      <input type="text" class="border p-2 w-full" id="satuan" name="satuan" value="{{ $pemeriksaan->satuan }}" required>
    </div>

    <div class="form-group">
      <label for="tarif">Tarif</label>
      <input type="text" class="border p-2 w-full" id="tarif" name="tarif" value="{{ $pemeriksaan->tarif }}" required>
    </div>

    <button type="submit" id='edit-form' class="btn btn-primary inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    <button type="button" onclick="history.back()" class="btn btn-secondary inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Kembali</button>
  </form>
</div>


@endsection