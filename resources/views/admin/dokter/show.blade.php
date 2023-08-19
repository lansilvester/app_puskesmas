@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('dokter.index') }}" class="btn btn-info mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
            <div class="card shadow-lg mb-3">
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($dokter->photo)
                            <img src="{{ asset($dokter->photo) }}" class="img-fluid" style="width: 200px;" alt="User Photo">
                        @else
                            <img class="img-fluid" src="https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png" width="200px">
                        @endif
                    </div>
                    <h1 class="card-title text-center">{{ $dokter['name'] }}</h1>
                    <hr>
                    @if(Auth::user()->role == 'admin')
                    @endif
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">Spesialisasi:</h5>
                        <p class="card-text">@if($dokter->dokter){{ $dokter->dokter->spesialisasi }}@endif</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">Email:</h5>
                        <p class="card-text">{{ $dokter->email }}</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">NIK:</h5>
                        <p class="card-text">{{ $dokter->nik }}</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">Nomor Telepon:</h5>
                        <p class="card-text">@if($dokter->dokter){{ $dokter->dokter->nomor_telepon }}@endif</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">Jenis Kelamin:</h5>
                        <p class="card-text">{{ ucfirst($dokter->jenis_kelamin) }}</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-subtitle text-bold">Alamat:</h5>
                        <p class="card-text">{{ $dokter->alamat }}</p>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Terdaftar Sejak {{ date('d F Y', strtotime($dokter->created_at)) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
