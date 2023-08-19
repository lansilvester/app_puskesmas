<!DOCTYPE html>
<html>
<head>
    <title>Rekam Medis</title>
    <style>
        /* Gaya CSS untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        .date{
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="date">
        <h3>Puskesmas Tinongko, <br>Desa Tinongko, Pulau Mantehage, Kec. Wori</h3><br>
        {{ \Carbon\Carbon::now()->TranslatedFormat('l, d F Y') }}
    </div>
    <h2>Data Pasien</h2>
    <table>
        <tr>
            <td style="width: 120px;">NIK</td>
            <td>{{ $pasien->nik }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $pasien->nama }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>{{ $pasien->nomor_telepon }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>{{ $pasien->alamat }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Keluhan</td>
            <td>{{ $pasien->keluhan }}</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td>{{ $pasien->tinggi }} Cm</td>
        </tr>
        <tr>
            <td>Berat Badan</td>
            <td>{{ $pasien->berat_badan }} Kg</td>
        </tr>
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </table>
    <h2>Data Rekam Medis</h2>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>No rekam medis</th>
            <th>Nama Dokter</th>
            <th>Diagnosa</th>
            <th>Poliklinik</th>
            <th>Resep Obat</th>
        </tr>
        @foreach ($data_rekam_medis as $data)
        <tr>
            <td>{{ $data->created_at->translatedFormat('l, d M Y') }}</td>
            <td>{{ $data->nomor_rekam_medis }}</td>
            <td>{{ $data->dokter->user->name }}</td>
            <td>{{ $data->diagnosa }}</td>
            <td>{{ $data->poliklinik->nama }}</td>
            <td>{{ $data->resep_obat }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>