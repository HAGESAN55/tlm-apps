@extends('pemeriksaan.proses')

@section('table')

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
      </tr>
  </thead>
  <tbody class="text-gray-600 text-sm">
    {{-- @php
      $sum =  0;
    @endphp
      @foreach ($pasien as $data)
      <tr class="border-b border-gray-200 hover:bg-gray-100">
          <td class="py-3 px-6">{{ $sum+=1 }}</td>
          <td class="py-3 px-6">{{ $data->kd_reg }}</td>
          <td class="py-3 px-6">{{ $data->tgl_regis }}</td>
          <td class="py-3 px-6">{{ $data->nama_pasien }}</td>
          <td class="py-3 px-6">{{ $data->kateg ? $data->kateg->kategori : 'Tidak ada' }}</td>
          <td class="py-3 px-6">{{ $data->jenis_kelamin }}</td>
          <td class="py-3 px-6">{{ $data->dokter ?$data->dokter->nama_dokter : 'Tidak ada Dokter' }}</td>
      </tr>
      @endforeach --}}

  </tbody>
</table> 

@endsection