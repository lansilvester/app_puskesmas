<!DOCTYPE html>
<html>
<head>
    <title>Rekam Medis Report</title>
    <style>
        /* Gaya CSS untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
            font-size:10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Rekam Medis Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Rekam Medis</th>
                <th>Tanggal Periksa</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Diagnosa</th>
                <th>Resep Obat</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data_rekam_medis as $rekam_medis)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $rekam_medis->nomor_rekam_medis }}</td>
                <td>{{ $rekam_medis->created_at->format('d-M-Y') }}</td>
                <td>{{ $rekam_medis->pasien->nama }}</td>
                <td>{{ $rekam_medis->dokter->user->name }}</td>
                <td>{{ $rekam_medis->diagnosa }}</td>
                <td>{{ $rekam_medis->resep_obat }}</td>
                <td>{{ $rekam_medis->pasien->keluhan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>