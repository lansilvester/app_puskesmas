@extends('admin.layouts.base')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Pasien Details</h3>
                </div>
                <div class="p-3">
                    <a href="{{ route('pasien.downloadPDF', $pasien->id) }}" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIK</th>
                                <td>{{ $pasien->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $pasien->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $pasien->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ ucfirst($pasien->jenis_kelamin) }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $pasien->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Keluhan Pasien</th>
                                <td>{{ $pasien->keluhan }}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>{{ $pasien->tinggi }} Cm</td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td>{{ $pasien->berat_badan }} Kg</td>
                            </tr>
                            <tr>
                                <th>Alamat koordinat</th>
                                <td>
                                    {!! $pasien->alamat_koordinat !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this pasien?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>
                    Data Rekam Medis    
                </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No rekam medis</th>
                            <th>Nama Dokter</th>
                            <th>Diagnosa</th>
                            <th>Poliklinik</th>
                            <th>Resep Obat</th>
                            <th>Aksi</th>
                        </tr>
                        @forelse ( $data_rekam_medis as $data)
                        <tr>
                            <td>{{ $data->nomor_rekam_medis }}</td>
                            <td>{{ $data->dokter->user->name }}</td>
                            <td>{{ $data->diagnosa }}</td>
                            <td>{{ $data->poliklinik->nama }}</td>
                            <td>{{ $data->resep_obat }}</td>
                            <td>
                                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this pasien?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection