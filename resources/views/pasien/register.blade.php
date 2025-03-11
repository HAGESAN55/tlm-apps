@extends('layouts.main')

@section('content')

<div class="container mx-auto p-4">
    <h3 class="text-2xl font-bold mb-4">Registrasi Pasien</h3>

    @if ($errors->any())
        <div class="bg-red-200 text-red-700 p-2 mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('alert'))
        <div class="bg-red-200 text-red-700 p-2 mb-4">
            {{ session('alert') }}
        </div>
    @endif


    <form id='form-reg-pasien' method="POST" action="{{ route('pasien.store') }}" >
        @csrf
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label>Kode Registrasi</label>
                <input type="text" name="kd_reg" class="bg-gray-50 border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ $kode_registrasi }}"  readonly>
            </div>
            <div>
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" class="border p-2 w-full">
            </div>
            <div>
                <label>Dokter Pengirim</label>
                <select name="id_dokter" class="border p-2 w-full">
                    <option value="">-Pilih Dokter-</option>
                    @foreach ($dokter as $d)
                    <option value="{{ $d->id_dokter }}" {{ old('id_dokter') == $d->id_dokter ? 'selected' : '' }}>
                      {{ $d->nama_dokter }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Golongan Darah</label>
                <select name="goldar" class="border p-2 w-full">
                    <option value="">-Pilih Goldar-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
            <div>
                <label>Status Menikah</label>
                <select name="status_menikah" class="border p-2 w-full">
                    <option value="">-Pilih Status-</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Jomblo Akut">Jomblo Akut</option>
                </select>
            </div>
            <div>
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="border p-2 w-full">
            </div>
            <div>
                <label>Alamat</label>
                <input type="text" name="alamat" class="border p-2 w-full">
            </div>
            <div>
                <label>Tanggal Registrasi</label>
                <input type="date" name="tgl_regis" class="border p-2 w-full" value="{{ date('Y-m-d') }}" readonly>
            </div>
            <div>
                <label>Kategori Pasien</label>
                <select name="id_kategori" class="border p-2 w-full">
                    <option value="">-Pilih Kategori-</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{ $k->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="border p-2 w-full">
                    <option value="">-Pilih Jenis Kelamin-</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="border p-2 w-full">
            </div>
            <div>
                <label>Telepon / No. Hp</label>
                <input type="text" name="telepon" class="border p-2 w-full">
            </div>

            <div>
                <label>Nama Ayah Kandung</label>
                <input type="text" name="nama_ayah" " class="border p-2 w-full">
            </div>

            <div>
                <label>Nama Ibu Kandung</label>
                <input type="text" name="nama_ibu" class="border p-2 w-full">
            </div>

            <div>
                <label>No.Kartu Keluarga</label>
                <input type="text" name="no_kk" class="border p-2 w-full">
            </div>
            
            <div>
                <label>Petugas</label>
                <input type="text" name="petugas" class="bg-gray-50 border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ Auth::user()->name }}" readonly>
            </div>
        </div>

        <div class="mt-4">
          <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md shadow">Registrasi</button>
          <button type="button" class="bg-yellow-500 text-white px-6 py-2 rounded-md shadow" onclick="window.history.back()">Kembali</button>          
        </div>
    </form>
</div>
@endsection