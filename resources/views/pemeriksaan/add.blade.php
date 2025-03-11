@extends('layouts.main')

@section('content')

<div class="container mx-auto p-4">

  <h1 class="text-2xl font-bold mb-4">Tambah Metode Pemeriksaan Baru</h1>
  <hr>

  <form action="{{ route('periksa.store') }}" method="POST" class="space-y-4">
    @csrf
    
    <div class="form-group">
      <label for="bidang_p">Bidang Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="bidang_p" name="bidang_p" required>
    </div>

    <div class="form-group">
      <label for="jenis_p">Jenis Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="jenis_p" name="jenis_p" required>
    </div>

    <div class="form-group">
      <label for="sub_p">Sub Pemeriksaan</label>
      <input type="text" class="border p-2 w-full" id="sub_p" name="sub_p" required>
    </div>

    <div class="form-group">
      <label for="nilai_normal">Nilai Normal</label>
      <input type="text" class="border p-2 w-full" id="nilai_normal" name="nilai_normal" required>
    </div>

    <div class="form-group">
      <label for="satuan">Satuan</label>
      <input type="text" class="border p-2 w-full" id="satuan" name="satuan" required>
    </div>

    <div class="form-group">
      <label for="tarif">Tarif</label>
      <input type="text" class="border p-2 w-full" id="tarif" name="tarif" required>
    </div>

    <button type="submit" class="btn btn-primary inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambahkan</button>
    <button type="button" onclick="history.back()" class="btn btn-secondary inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Kembali</button>
  </form>
</div>


@endsection