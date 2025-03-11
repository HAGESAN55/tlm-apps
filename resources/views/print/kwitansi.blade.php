<!DOCTYPE html>
<html>
<head>
    <title>Nota Pemeriksaan</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo hb.png') }}">
</head>
<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 10pt;
        }
    </style>

    <img src="{{ asset('images/KOP.JPG') }}" width="100%">
    <hr size="3">
    <h3 align="center">NOTA PEMERIKSAAN</h3>

    <br/>
    <table>
            <tr>
                <td width="150">No.RM</td>
                <td>:</td>
                <td width="200">{{ $pasien->kd_reg }}</td>
                <td width="150">Pengirim</td>
                <td>:</td>
                <td>{{ $pasien->dokter ?$pasien->dokter->nama_dokter : 'Tidak ada Dokter' }}</td>
            </tr>
            <tr>
                <td>Tgl.Registrasi</td>
                <td>:</td>
                <td>{{ $pasien->tgl_regis }}</td>
                <td>Kategori Pasien</td>
                <td>:</td>
                <td>{{ $pasien->kateg ?$pasien->kateg->kategori :  'Tidak Ada Kategori' }}</td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>{{ $pasien->nama_pasien }}</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pasien->alamat }}</td>
                <td>Selesai</td>
                <td>:</td>
                <td>
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('H:i:s');
                        echo $tgl;
                    @endphp
                </td>
            </tr>

    </table>

    <br/>
    <table class="table-data">
        <thead>
            <tr>
                <th height="30px">BIDANG</th>
                <th>PEMERIKSAAN</th>
                <th>SUB PERIKSA</th>
                <th>NILAI NORMAL</th>
                <th>TARIF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $data)
            <tr>
              <td style="padding: 5px; text-align: center;">{{ $data->pemeriksaan ? $data->pemeriksaan->bidang_p : "Tidak ada" }}</td>
              <td style="padding: 5px; text-align: center;">{{ $data->pemeriksaan ? $data->pemeriksaan->jenis_p : "Tidak ada" }}</td>
              <td style="padding: 5px; text-align: center;">{{ $data->pemeriksaan ? $data->pemeriksaan->sub_p : "Tidak ada" }}</td>
              <td style="padding: 5px; text-align: center;">{{ $data->hasil }}</td>
              <td style="padding: 5px; text-align: center;">{{ $data->pemeriksaan ? $data->pemeriksaan->nilai_normal : "Tidak ada" }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right" style="padding: 5px"><b>Biaya Total</b></td>
                <td style="padding: 5px"><b>Rp. {{ $total }},-</b></td> 
            </tr>
                <tr>
                    <td colspan="4" align="right" style="padding: 5px"><b>Uang Bayar</b></td>
                    <td style="padding: 5px"><b>Rp. {{ number_format($transaksi[0]->uang_bayar, 0, ',', '.') }},-</b></td>
                </tr>
                <tr>
                    <td colspan="4" align="right" style="padding: 5px"><b>Uang Kembali</b></td>
                    <td style="padding: 5px"><b>Rp. {{ number_format($transaksi[0]->uang_kembali, 0, ',', '.') }},-</b></td>
                </tr>
        </tbody>
    </table>

    <br/>
    <br/>
    <table>
        <tr>
            <td width="400"></td>
            <td width="400" align="center">
                Tanggal Cetak :
                @php
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl = date('Y-m-d');
                    echo $tgl;
                @endphp
            </td>
        </tr>
        <tr>
            <td align="center">Penanggung Jawab</td>
            <td align="center">Analisis Pemeriksa</td>
        </tr>
        <tr>
            <td align="center" height="150">(..................................)</td>
            <td align="center">(..................................)</td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>