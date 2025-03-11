@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Data Transaksi</h1>

    <form method="get" action="{{ route('transaksi.index') }}" class="mb-4">
        <label for="perpage">Tampilkan:</label>
        <select name="perpage" id="perpage" class="border rounded px-2 py-1" onchange="this.form.submit()">
            <option value="5" {{ $perpage  == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ $perpage == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ $perpage == 20 ? 'selected' : '' }}>20</option>
        </select>
    </form>
    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">No Pemeriksaan</th> 
                <th class="py-3 px-6 text-left">Kode Registrasi</th>
                <th class="py-3 px-6 text-left">Hasil</th>
                <th class="py-3 px-6 text-left">Biaya</th>
                <th class="py-3 px-6 text-left">Uang Bayar</th>
                <th class="py-3 px-6 text-left">Uang Kembali</th>
                <th class="py-3 px-6 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach ($transaksi as $data)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $data->id_transaksi}}</td>
                <td class="py-3 px-6">{{ $data->id_pemeriksaan }}</td>
                <td class="py-3 px-6">{{ $data->kd_reg }}</td>
                <td class="py-3 px-6">{{ $data->hasil }}</td>
                <td class="py-3 px-6">{{ $data->biaya }}</td>
                <td class="py-3 px-6">{{ $data->uang_bayar }}</td>
                <td class="py-3 px-6">{{ $data->uang_kembali }}</td>
                <td class="py-3 px-6">{{ $data->status }}</td>
            </tr>
            @endforeach

        </tbody>
    </table> 

    <!-- Tambahkan Pagination -->
    <div class="mt-4">
        {{ $transaksi->appends(['perPage' => $perpage])->links() }} 
    </div>

</div>
@endsection
