@extends('layouts.main')

@section('content')

<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Data Rekam Medis Pasien: {{ $pasien->nama_pasien }}</h1>
    <hr>

  <form id='form-reg-pasien' method="POST" action="{{ route('pemeriksaan.store', old('kd_reg', $pasien->kd_reg)) }}" enctype='multipart/form-data' >
    @csrf

    
    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Kode Registrasi</label>
                <input type="hidden" name="kd_reg" value="{{ session('kd_reg') }}">
                <input type="text" name="kd_reg" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('kd_reg', $pasien->kd_reg) }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="hidden" name="nama_pasien" value="{{ session('nama_pasien') }}">
                <input type="text" name="nama_pasien" class="border p-2 w-full cursor-not-allowed focus:outline-nones" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Kategori Pasien</label>
                <input type="text" name="kategori" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('kateg', $pasien->kateg ?$pasien->kateg->kategori : 'Tidak ada') }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('jenis_kelamin', $pasien->jenis_kelamin) }}" readonly>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Tanggal Registrasi</label>
                <input type="date" name="tgl_regis" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('tgl_regis', $pasien->tgl_regis) }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Dokter Pengirim</label>
                <input type="text" name="id_dokter" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('dokter', $pasien->dokter ?$pasien->dokter->nama_dokter : "Tidak Ada") }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('alamat', $pasien->alamat) }}" readonly>
            </div>
            
            <div class="form-group">
                <label>Golongan Darah</label>
                <input type="text" name="goldar" class="border p-2 w-full cursor-not-allowed focus:outline-none" value="{{ old('goldar', $pasien->goldar) }}" readonly>
            </div>
        </div>
    </div>

    <div>
        <h1 class="text-2xl font-bold  mt-6">Form Input Pemeriksaan</h1>
    </div>
      <div x-data="{ openModal: false, selectedPemeriksaan: null }">
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>Bidang Periksa</label>
                    <input type="hidden" name="id_pemeriksaan" :value="selectedPemeriksaan.id_pemeriksaan">
                    <input type="hidden" name='status' value="0">
                    <input type="text" name="bidang_p" id="bidang_p" class="border p-2 w-full" x-model="selectedPemeriksaan.bidang_p" required>
                </div>
                
                <div class="form-group">
                    <label>Pemeriksaan</label>
                    <input type="text" name="jenis_p" id="jenis_p" class="border p-2 w-full" x-model="selectedPemeriksaan.jenis_p" required>
                </div>
                
                <div class="form-group">
                    <label>Sub Periksa</label>
                    <input type="text" name="sub_p" id="sub_p" class="border p-2 w-full" x-model="selectedPemeriksaan.sub_p" required>
                </div>
                
                <div class="form-group">
                    <label>Nilai Normal</label>
                    <input type="text" name="nilai_normal" id="nilai_normal" class="border p-2 w-full" x-model="selectedPemeriksaan.nilai_normal" required>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="border p-2 w-full" x-model="selectedPemeriksaan.satuan" required>
                </div>
                
                <div class="form-group">
                    <label>Tarif</label>
                    <input type="text" name="biaya" id="biaya" class="border p-2 w-full"  x-model="selectedPemeriksaan.biaya" required>
                </div>
                
                <div class="form-group">
                    <label>Hasil Pemeriksaan</label>
                    <input type="text" name="hasil" class="border p-2 w-full" required>
                </div>
                
                <div class="col-lg-6 mt-3">
                        <!-- Tombol untuk Membuka Modal -->
                        <button type="button" @click="openModal = true" class="bg-blue-400 text-white px-6 py-2 rounded-lg">
                            Pilih
                        </button>
                        @if($pasien->status_pembayaran == "0")
                        <button id="form-reg-pasien" type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-mt-3" value='tambahkan'>
                            Tambah Data
                        </button>
                        @endif
                        {{-- <button type="button" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow mt-3" onclick="window.history.go(-1)">Kembali</button> --}}
                        <a href="{{ route('pasien.manage.index') }}" class="bg-blue-600 text-white font-normal px-4 py-2 rounded-lg shadow-mt-3">Kembali</a>
                        <!-- Modal -->
                        <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded-lg shadow-lg  max-h-96 overflow-y-auto">
                                <h2 class="text-xl font-bold mb-4">Tambah Pasien</h2>
                            

                            <!-- Tabel Pemeriksaan -->
                            <table class="w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border p-2">No</th>
                                        <th class="border p-2">Bidang</th>
                                        <th class="border p-2">Jenis Pemeriksaan</th>
                                        <th class="border p-2">Sub</th>
                                        <th class="border p-2">Tarif</th>
                                        <th class="border p-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemeriksaan as $index => $p)
                                    <tr>
                                        <td class="border p-2">{{ $index + 1 }}</td>
                                        <td class="border p-2">{{ $p->bidang_p }}</td>
                                        <td class="border p-2">{{ $p->jenis_p }}</td>
                                        <td class="border p-2">{{ $p->sub_p }}</td>
                                        <td class="border p-2">Rp. {{ number_format($p->tarif, 0, ',', '.') }}</td>
                                        <td class="border p-2">
                                            <button type="button"
                                            @click="selectedPemeriksaan = { 
                                                id_pemeriksaan: '{{ $p->id_pemeriksaan }}',
                                                bidang_p: '{{ $p->bidang_p }}', 
                                                jenis_p: '{{ $p->jenis_p }}',
                                                sub_p: '{{ $p->sub_p }}',
                                                nilai_normal: '{{ $p->nilai_normal }}',
                                                satuan: '{{ $p->satuan }}',
                                                biaya: '{{ $p->tarif }}'
                                            };openModal = false;" 
                                                class="bg-green-500 text-white px-2 py-1 rounded-lg">
                                                Pilih
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Tombol tutup -->
                            <div class="mt-4 text-right">
                                <button @click="openModal = false" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                    Tutup
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
  </form>

   

        <div class="col-lg-1 col-md-1 col-span-2"> 
            <h1 class="text-2xl font-bold m-4">Detail Hasil Pemeriksaan</h1>

            @if ($pasien->status_pembayaran == "0")
            <form action="{{ route('pemeriksaan.update', $pasien->kd_reg) }}" id='form-bayar' method="POST">
            @csrf
            <div class="mt-3">
                <label>Masukkan uang pembayaran</label>
            </div>
            <div class="mt-3">
                <input type="hidden" name="kd_reg" id="kd_reg" value="{{ $pasien->kd_reg }}">
                <input type="text" name="bayar" id="bayar" class="border p-2 w-full md-4">
                <button id="form-bayar" type="submit" class='bg-blue-500 text-white px-6 py-2 rounded-lg'>Bayar</button>
            </div>
            </form>
            @else
            <div style="display: flex; gap: 20px;">
            <form action="{{ route('print.hasil') }}" method="get" id='print-hasil' target='_blank'>
                @csrf
                <input type="hidden" name="kd_reg" id="kd_reg" value="{{ $pasien->kd_reg }}">
                <button id="print-hasil" type="submit" class='bg-green-500 text-white px-6 py-2 rounded-lg'>Print Hasil</button>
            </form>
            <form action="{{ route('print.kwitansi') }}" method="get" id='print-kwitansi' target='_blank'>
                @csrf
                <input type="hidden" name="kd_reg" id="kd_reg" value="{{ $pasien->kd_reg }}">
                <button id="print-kwitansi" type="submit" class='bg-blue-500 text-white px-6 py-2 rounded-lg'>Print Kwitansi</button>
            </form>
            </div>
            @endif

        </div>


        <div class="col-lg-1 col-md-1 col-span-2">
            <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leadong-normal">
                    <th class="px-6 text-left py-2">NO</th>
                    <th class="px-6 text-left py-2">Bidang Pemeriksaan</th>
                    <th class="px-6 text-left py-2">Periksa</th>
                    <th class="px-6 text-left py-2">Sub Periksa</th>
                    <th class="px-6 text-left py-2">Hasil Pemeriksaan</th>
                    <th class="px-6 text-left py-2">Nilai Normal</th>
                    <th class="px-6 text-left py-2">Tarif</th>
                </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <?php
                        ?>
                    @foreach ($transaksi as $index => $data)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-2">{{ $index+=1 }}</td>
                        <td class="px-6 py-2">{{ $data->pemeriksaan ? $data->pemeriksaan->bidang_p : "Tidak ada" }}</td>
                        <td class="px-6 py-2">{{ $data->pemeriksaan ? $data->pemeriksaan->jenis_p : "Tidak ada" }}</td>
                        <td class="px-6 py-2">{{ $data->pemeriksaan ? $data->pemeriksaan->sub_p : "Tidak ada" }}</td>
                        <td class="px-6 py-2">{{ $data->hasil }}</td>
                        <td class="px-6 py-2">{{ $data->pemeriksaan ? $data->pemeriksaan->nilai_normal : "Tidak ada" }}</td>
                        <td class="px-6 py-2">{{ $data->pemeriksaan ? $data->pemeriksaan->tarif : "Tidak ada" }}</td>
                    </tr>
                    @endforeach
                    <tr class="border-b bg-gray-200 text-gray-600 font-bold hover:bg-gray-100">
                        <td class="px-6 py-2" colspan="6" align='right'>Total</td>
                        <td class="px-6 py-2">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>

</div>
@endsection
