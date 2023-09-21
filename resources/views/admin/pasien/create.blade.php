@extends('admin.layouts.base')

@section('content')
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
/>
<script
  src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
></script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Tambah data Pasien</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK">
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="Laki-laki" checked>
                        <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="Perempuan">
                        <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="Masukan Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="keluhan">Keluhan:</label>
                    <textarea name="keluhan" id="keluhan" class="form-control" rows="3" placeholder="Masukan Keluhan"></textarea>
                </div>
                        <div class="form-group">
                    <label for="tinggi">Tinggi (cm):</label>
                    <input type="text" name="tinggi" id="tinggi" class="form-control" placeholder="Masukkan Tinggi">
                </div>
                <div class="form-group">
                    <label for="berat_badan">Berat Badan (kg):</label>
                    <input type="text" name="berat_badan" id="berat_badan" class="form-control" placeholder="Masukkan Berat Badan">
                </div>
                <div class="form-group">
                    <label for="berat_badan">Koordinat Alamat:</label>
                    <input type="text" name="alamat_koordinat" id="alamat_koordinat" class="form-control" placeholder="(longitude,langitude)">
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
            </form>
        
        </div>
    </div>

</div>
@endsection
