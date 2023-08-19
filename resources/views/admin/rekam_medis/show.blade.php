@extends('admin.layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail Rekam Medis</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('rekam_medis.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter' ||Auth::user()->role == 'pegawai'  )
                                <a href="{{ route('rekam_medis.edit', $data_rekam_medis->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                            @endif
                        </div>
                        <style>
                            th{
                                width:30%;
                            }
                        </style>
                        <table class="table table-bordered my-2">
                            <tr>
                                <th>Tanggal Periksa</th>
                                <td>{{ $data_rekam_medis->created_at->format('D,d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekam Medis</th>
                                <td>{{ $data_rekam_medis->nomor_rekam_medis }}</td>
                            </tr>
                            <tr>
                                <th>Pasien</th>
                                <td>{{ $data_rekam_medis->pasien->nama }}</td>
                            </tr>
                            <tr>
                                <th>Dokter</th>
                                <td>
                                        {{ $data_rekam_medis->dokter->user->name }}
                              
                                </td>
                            </tr>
                            <tr>
                                <th>Poliklinik</th>
                                <td>{{ $data_rekam_medis->poliklinik->nama }}</td>
                            </tr>
                           
                            <tr>
                                <th>Diagnosa</th>
                                <td>{{ $data_rekam_medis->diagnosa }}</td>
                            </tr>
                            <tr>
                                <th>Resep Obat</th>
                                <td>{{ $data_rekam_medis->resep_obat }}</td>
                            </tr>
                            
                            <tr>
                                <th>Terakhir diubah</th>
                                <td>{{ $data_rekam_medis->updated_at->format('D, d-M-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
