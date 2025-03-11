@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>

    <h1 class="text-2xl font-bold mb-4">Data Pemeriksaan</h1>

    <form method="get" action="{{ route('pemeriksaan.index') }}" class="mb-4">
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
                <th class="py-3 px-6 text-left">ID Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Bidang Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Jenis Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Sub Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Nilai Normal</th>
                <th class="py-3 px-6 text-left">Satuan</th>
                <th class="py-3 px-6 text-left">Tarif</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach ($pemeriksaan as $periksa)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $periksa->id_pemeriksaan }}</td>
                <td class="py-3 px-6">{{ $periksa->bidang_p }}</td>
                <td class="py-3 px-6">{{ $periksa->jenis_p }}</td>
                <td class="py-3 px-6">{{ $periksa->sub_p }}</td>
                <td class="py-3 px-6">{{ $periksa->nilai_normal }}</td>
                <td class="py-3 px-6">{{ $periksa->satuan }}</td>
                <td class="py-3 px-6">Rp.{{ number_format($periksa->tarif, 0, ',', '.') }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-4">
        {{ $pemeriksaan->appends(['perpage' => $perpage])->links() }}
    </div>
</div>
@endsection
