@extends('admin.layouts.base')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert bg-white">

        <h1 class="">Dashboard Database Puskesmas Tinongko</h1>
        <address>Desa Tinongko, Pulau Mantehage, Kec. Wori</address>
    </div>

    <!-- Content Row -->
    @if(Auth::user()->role !== 'dokter')
    <div class="row">

        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <a href="{{ route('users.index') }}">
                                        {{ $data_user->count() }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ route('dokter.index') }}">
                                    {{ $data_dokter->count() }}
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Poliklinik
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <a href="{{ route('poliklinik.index') }}">
                                            {{ $data_poliklinik->count() }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Seluruh Rekam Medis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ route('rekam_medis.index') }}">
                                    {{ $data_rekam_medis->count() }}                            
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (Auth::user()->role == 'dokter')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ route('pasien.index') }}">
                                    {{ $data_pasien->count() }}
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Rekam Medis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <a href="{{ route('rekam_medis.index') }}">
                                    {{ $data_rekam_medis->count() }}
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    @endif
    <!-- Content Row -->
</div>
@endsection