
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
        <h1>Dashboard</h1>
        <h2 class="text-3xl font-bold text-gray-800">Welcome, {{ Auth::user()->name }} !</h2>
        <div class="flex justify-between mb-3"><hr></div>
        <div class="flex justify-between mb-6 ">
            <a href="{{ route('pasien.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ">
                + Registrasi Pasien
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Admin</h2>
                <p class="text-gray-600">Lihat daftar Admin</p>
                <a href="{{ route('admin.index') }}" class="text-blue-600 font-semibold">Lihat Selengkapnya!</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Pasien</h2>
                <p class="text-gray-600">Lihat daftar pasien</p>
                <a href="{{ route('pasien.index') }}" class="text-violet-600 font-semibold">Lihat selengkapnya!</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Pemeriksaan</h2>
                <p class="text-gray-600">Lihat daftar Pemeriksaan Pasien</p>
                <a href="{{ route('pemeriksaan.index') }}" class="text-yellow-600 font-semibold">Lihat selengkapnya!</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Dokter</h2>
                <p class="text-gray-600">Lihat daftar Dokter disini!</p>
                <a href="{{ route('dokter.index') }}" class="text-pink-600 font-semibold">Lihat selengkapnya!</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Transaksi</h2>
                <p class="text-gray-600">Lihat detail transaksi</p>
                <a href="{{ route('transaksi.index') }}" class="text-green-600 font-semibold">Lihat selengkapnya!</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-gray-700">Rp. {{ number_format($totalpenghasilan, 0, ',', '.') }}</h2>
                <p class="text-gray-600"></p>
                <a href="{{ route('transaksi.index') }}" class="text-yellow-600 font-semibold">Lihat peghasilan!</a>
            </div>

            
        </div> 
@endsection