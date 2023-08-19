@extends('admin.layouts.base')

@section('content')
<div class="container-fluid mt-5">
    <h1>Tambah User</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
        </div>
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="pria" checked>
                <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="wanita">
                <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat"></textarea>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="pegawai" selected>Pegawai</option>
                <option value="dokter">Dokter</option>
                <option value="apoteker">Apoteker</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Tambah User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
