@extends('admin.layouts.base')

@section('content')
<style>
    svg{
        width:20px;
    }
</style>

<div class="container-fluid mt-5">
    <form class="d-none d-sm-inline-block mb-3" action="{{ route('search.rekam_medis') }}" method="GET">
        <div class="input-group">
            @if(request()->has('search'))
            <a href="{{ route('rekam_medis.index') }}" class="btn">
                <i class="fas fa-times"></i>
            </a>
            @endif
            <select class="form-control" id="search_by" name="search_by">
                <option value="pasien" @if(request('search_by') === 'pasien') selected @endif>Pasien</option>
                <option value="dokter" @if(request('search_by') === 'dokter') selected @endif>Dokter</option>
                <option value="diagnosa" @if(request('search_by') === 'diagnosa') selected @endif>Diagnosa</option>
                <option value="nomor_rekam_medis" @if(request('search_by') === 'nomor_rekam_medis') selected @endif>Nomor Rekam Medis</option>
            <input type="text" class="form-control w-50" placeholder="Cari..."
                aria-label="Search" aria-describedby="basic-addon2" name="search" value={{ request()->search }}>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    @if(request()->has('search'))
    <p>Data tentang <i>`{{ request()->search }}`</i></p>
    @endif
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
     
            <div class="card">
                <div class="card-header">
                    <h2>Daftar Rekam Medis</h2>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">                    
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
                        <a href="{{ route('rekam_medis.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Rekam Medis</a>
                        @endif
                        <a href="{{ route('rekam_medis.downloadPDF') }}" class="btn btn-primary mb-3" target="_blank"><i class="fas fa-download"></i> Download Laporan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Rekam Medis</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Diagnosa</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @forelse($data_rekam_medis as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nomor_rekam_medis }}</td>
                                    <td>{{ $data->pasien->nama }}</td>
                                    <td>{{ $data->dokter->user->name }}</td>
                                    <td>{{ $data->diagnosa }}</td>
                                    <td>{{ $data->created_at->translatedFormat('l,d-M-Y') }}</td>
                                    <td>
                                        <a href="{{ route('rekam_medis.show', ['rekam_medi' => $data->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
                                        <a href="{{ route('rekam_medis.edit', ['rekam_medi' => $data->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('rekam_medis.destroy', ['rekam_medi' => $data->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" align="center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $data_rekam_medis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
