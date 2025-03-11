@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('pasien.index') }}" class="text-blue-600 font-semibold">Kembali</a>

    <h1 class="text-2xl font-bold mb-4">Management Pasien</h1>
    <div class="flex justify-between mb-4">
      <a href="{{ route('pasien.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
      + Registrasi Pasien
      </a>

      @if (session('success'))
          <div id="success-message" class="right-14 bg-green-200 text-green-700 py-2 px-4 rounded-lg">
              {{ session('success') }}
          </div>

          <script>
            setTimeout(function() {
                let message = document.getElementById('success-message');
                if (message) {
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500); // Hapus elemen setelah fade out
                }
            }, 3000);
          </script> 
      @endif
    </div>

    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">NO</th>
                <th class="py-3 px-6 text-left">No RM</th> 
                <th class="py-3 px-6 text-left">Tgl Reg</th>
                <th class="py-3 px-6 text-left">Pasien</th>
                <th class="py-3 px-6 text-left">Kategori</th>
                <th class="py-3 px-6 text-left">Gender</th>
                <th class="py-3 px-6 text-left">Dokter</th>
                <th class="py-3 px-6 text-left">Petugas</th>
                <th class="py-3 px-6 text-left">Pembayaran</th>
                <th class="py-3 px-6 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
          @php
            $sum =  0;
          @endphp
            @foreach ($managePas as $data)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $sum+=1 }}</td>
                <td class="py-3 px-6">{{ $data->kd_reg }}</td>
                <td class="py-3 px-6">{{ $data->tgl_regis }}</td>
                <td class="py-3 px-6">{{ $data->nama_pasien }}</td>
                <td class="py-3 px-6">{{ $data->kateg ? $data->kateg->kategori : 'Tidak ada' }}</td>
                <td class="py-3 px-6">{{ $data->jenis_kelamin }}</td>
                <td class="py-3 px-6">{{ $data->dokter ?$data->dokter->nama_dokter : 'Tidak ada Dokter' }}</td>
                <td class="py-3 px-6">{{ $data->petugas ?$data->petugas->nama_petugas : 'Tidak ada Petugas' }}</td>
                <td class="py-3 px-6" align="center">@if ($data->status_pembayaran == "0")
                    <p class="bg-red-500 text-white rounded-md font-semibold py-2 shadow-md  w-full">Belum Lunas</p>
                    @elseif ($data->status_pembayaran == "1")
                    <p class="bg-green-500 text-white rounded-md font-semibold py-2 shadow-md w-full">Lunas</p>
                @endif</td>
                <td class="py-3 px-6">
                    <a href="{{ route('pemeriksaan.proses',  $data->kd_reg) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg">
                    Edit
                </a></td>
            </tr>
            @endforeach

        </tbody>
    </table> 
</div>
@endsection
