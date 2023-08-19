@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $pasien->nik }}" required>
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $pasien->nama }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4" required>{{ $pasien->alamat }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $pasien->tanggal_lahir }}" required>
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="Laki-laki" @if($pasien->jenis_kelamin === 'Laki-laki') checked @endif required>
                                <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="Perempuan" @if($pasien->jenis_kelamin === 'Perempuan') checked @endif required>
                                <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                            </div>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="tel" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ $pasien->nomor_telepon }}" required>
                            @error('nomor_telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <input type="text" name="keluhan" id="keluhan" class="form-control @error('keluhan') is-invalid @enderror" value="{{ $pasien->keluhan }}" required>
                            @error('keluhan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tinggi">Tinggi (cm):</label>
                            <input type="text" name="tinggi" id="tinggi" class="form-control" value="{{ old('tinggi', $pasien->tinggi) }}">
                            @error('tinggi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan (kg):</label>
                            <input type="text" name="berat_badan" id="berat_badan" class="form-control" value="{{ old('berat_badan', $pasien->berat_badan) }}">
                            @error('berat_badan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.29838665768!2d124.74744709058905!3d1.7131578396351752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32879396ba513c79%3A0x345602d7c938f46d!2sPulau%20Manterawu!5e0!3m2!1sid!2sid!4v1692365980984!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br>
                        <div class="form-group">
                            <label for="alamat_koordinat">Koordinat Alamat:</label>
                            <input type="text" name="alamat_koordinat" id="alamat_koordinat" class="form-control" placeholder="Masukkan Koordinat Alamat" value="{{ $pasien->alamat_koordinat }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Pasien</button>
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
