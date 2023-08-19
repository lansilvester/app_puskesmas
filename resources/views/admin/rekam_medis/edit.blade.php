@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h2>Edit Data Rekam Medis</h2>
            @if (Session::has('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <div class="my-3">
                <a href="{{ route('rekam_medis.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <form action="{{ route('rekam_medis.update', $rekam_medis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_pasien">Nama Pasien</label>
                    <select name="id_pasien" id="id_pasien" class="form-control @error('id_pasien') is-invalid @enderror" >
                        <option value="">Pilih Pasien</option>
                        @foreach($data_pasien as $pasien)
                            <option value="{{ $pasien->id }}" {{ $rekam_medis->id_pasien == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_pasien')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_dokter">Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-control @error('id_dokter') is-invalid @enderror">
                        @if (auth()->user()->role === 'dokter')
                            @foreach ($data_dokter as $dokter)
                                @if (auth()->user()->id === $dokter->user->id)
                                    <option value="{{ $dokter->id }}" selected readonly>{{ $dokter->user->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($data_dokter as $dokter)
                                <option value="{{ $dokter->id }}" {{ $rekam_medis->id_dokter == $dokter->id ? 'selected' : '' }}>{{ $dokter->user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('id_dokter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                
                <div class="form-group">
                    <label for="id_poliklinik">Poliklinik</label>
                    <select name="id_poliklinik" id="id_poliklinik" class="form-control @error('id_poliklinik') is-invalid @enderror" >
                        <option value="">-- Pilih --</option>
                        @foreach($data_poliklinik as $poliklinik)
                            <option value="{{ $poliklinik->id }}" {{ $rekam_medis->id_poliklinik == $poliklinik->id ? 'selected' : '' }}>{{ $poliklinik->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_poliklinik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="diagnosa">Diagnosa</label>
                    <textarea name="diagnosa" id="diagnosa" class="form-control @error('diagnosa') is-invalid @enderror" rows="4" >{{ $rekam_medis->diagnosa }}</textarea>
                    @error('diagnosa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="resep_obat">Resep Obat</label>
                    <textarea name="resep_obat" id="resep_obat" class="form-control @error('resep_obat') is-invalid @enderror" rows="4" >{{ $rekam_medis->resep_obat }}</textarea>
                    @error('resep_obat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
