@extends('layouts.main')

@section('content')
<div class="container mx-auto p-4">

    <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>
    <h1 class="text-2xl font-bold mb-4">Administrator</h1>
    <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ">
        + Registrasi Petugas
    </a>

    <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden mt-6">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">Nama Petugas</th> 
                <th class="py-3 px-6 text-left">Username</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            @foreach ($admin as $data)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6">{{ $data->id}}</td>
                <td class="py-3 px-6">{{ $data->name }}</td>
                <td class="py-3 px-6">{{ $data->username }}</td>
            </tr>
            @endforeach

        </tbody>
    </table> 

    <!-- Tambahkan Pagination -->
    {{ $admin->appends(['perPage' => session('perPage', 10)])->links() }} 

</div>
@endsection
