@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Administrator</h1>

    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">Nama Petugas</th> 
                <th class="py-3 px-6 text-left">Username</th>
                <th class="py-3 px-6 text-left">Password</th>
                <th class="py-3 px-6 text-left">Tanggal Daftar</th>
                <th class="py-3 px-6 text-left">Jenis Kelamin</th>
                <th class="py-3 px-6 text-left">Telepon</th>
                <th class="py-3 px-6 text-left">Alamat</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach ($admin as $data)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $data->id_petugas}}</td>
                <td class="py-3 px-6">{{ $data->nama_petugas }}</td>
                <td class="py-3 px-6">{{ $data->username }}</td>
                <td class="py-3 px-6">{{ $data->repassword }}</td>
                <td class="py-3 px-6">{{ $data->tgl_daftar }}</td>
                <td class="py-3 px-6">{{ $data->jenis_kelamin }}</td>
                <td class="py-3 px-6">{{ $data->telepon }}</td>
                <td class="py-3 px-6">{{ $data->alamat }}</td>
            </tr>
            @endforeach

        </tbody>
    </table> 

    <!-- Tambahkan Pagination -->
    {{ $admin->appends(['perPage' => session('perPage', 10)])->links() }} 

</div>
@endsection
