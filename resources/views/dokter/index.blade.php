
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

            <a href="{{ route('dashboard.index') }}" class="text-blue-600 font-semibold">Kembali</a>
            <h1 class="text-2xl font-bold mb-4">Daftar Dokter</h1>

            <div class="flex justify-between mb-4">
                <table class="table-auto w-50 bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">NO</th>
                            <th class="py-3 px-6 text-left">Nama Dokter</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        @foreach ($dokter as $index => $ddoc)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $index += 1 }}</td>
                            <td class="py-3 px-6">{{ $ddoc->nama_dokter }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
            </div> 
@endsection