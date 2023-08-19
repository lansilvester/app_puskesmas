@extends('admin.layouts.base')

@section('content')
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.29838665768!2d124.74744709058905!3d1.7131578396351752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32879396ba513c79%3A0x345602d7c938f46d!2sPulau%20Manterawu!5e0!3m2!1sid!2sid!4v1692365980984!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br>
                <div class="form-group">
                    <label for="alamat_koordinat">Koordinat Alamat:</label>
                    <input type="text" name="alamat_koordinat" id="alamat_koordinat" class="form-control" placeholder="Masukkan Koordinat Alamat">
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Submit</button>
            </form>
        
        </div>
    </div>

</div>
@endsection
