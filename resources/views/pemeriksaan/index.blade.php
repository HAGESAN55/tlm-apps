@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Data Pemeriksaan</h1>

    <div class="flex justify-between">
    <a href="{{ route('periksa.add') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ">
        + Buat Pemeriksaan
    </a>

    
    @if (session('success'))
    <div id="success-message" class="inset-0 flex items-center justify-center bg-green-200 text-green-700 py-2 px-4 rounded-lg">
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

    <form method="get" action="{{ route('pemeriksaan.index') }}" class="m-4">
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
                <th class="py-3 px-6 text-left">NO</th>
                <th class="py-3 px-6 text-left">Bidang Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Jenis Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Sub Pemeriksaan</th>
                <th class="py-3 px-6 text-left">Nilai Normal</th>
                <th class="py-3 px-6 text-left">Satuan</th>
                <th class="py-3 px-6 text-left">Tarif</th>
                <th class="py-3 px-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach ($pemeriksaan as $index => $periksa)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-center">{{ $periksa->id_pemeriksaan }}</td>
                <td class="py-3 px-6">{{ $periksa->bidang_p }}</td>
                <td class="py-3 px-6">{{ $periksa->jenis_p }}</td>
                <td class="py-3 px-6">{{ $periksa->sub_p }}</td>
                <td class="py-3 px-6">{{ $periksa->nilai_normal }}</td>
                <td class="py-3 px-6">{{ $periksa->satuan }}</td>
                <td class="py-3 px-6">Rp.{{ number_format($periksa->tarif, 0, ',', '.') }}</td>
                <td class="py-3 px-6">
                    <div class="flex flex-col space-y-2">
                        <a href="{{ route('periksa.edit', $periksa->id_pemeriksaan) }}" class='bg-yellow-500 hover:bg-yellow-600 text-white p-2 px-4 rounded-full flex items-center justify-center'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('periksa.destroy', $periksa->id_pemeriksaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full flex items-center justify-center" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash"></i> 
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-4">
        {{ $pemeriksaan->appends(['perpage' => $perpage])->links() }}
    </div>
</div>
@endsection
