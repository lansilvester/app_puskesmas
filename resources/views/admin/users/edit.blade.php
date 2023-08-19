@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', ['user' =>$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-center">
                            @if($user->photo)
                                <img src="{{ asset($user->photo) }}" class="img-fluid" style="width: 400px;" alt="User Photo">
                            @else
                                <img class="img-fluid" src="https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png" width="200px">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo">Profile Photo</label><br>
                            @if(!$user->photo)
                            <img class="" src="{{ asset($user->photo) }}" width="300px">
                            @endif
                                <img class="img-preview img-fluid" width="300px">
                            <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" value="{{ $user->photo }}" onchange="previewImage()">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ $user->nik }}" maxlength="16">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                @if (Auth::user()->role == 'admin')
                                <option value="admin" @if($user->role === 'admin') selected @endif>Admin</option>
                                @endif
                                
                                <option value="dokter" @if($user->role === 'dokter') selected @endif>Dokter</option>
                                <option value="pegawai" @if($user->role === 'pegawai') selected @endif>Pegawai</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif
                       

                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="pria" @if($user->jenis_kelamin === 'pria') checked @endif>
                                <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="wanita" @if($user->jenis_kelamin === 'wanita') checked @endif>
                                <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                            </div>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="4">{{ $user->alamat }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(Auth::user()->role == 'dokter' && $user->dokter)
                        <div class="form-group">
                            <label for="spesialisasi">Spesialisasi</label>
                            <input type="text" name="spesialisasi" id="spesialisasi" class="form-control @error('spesialisasi') is-invalid @enderror" value="{{ $user->dokter->spesialisasi }}" maxlength="16">
                            @error('spesialisasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">nip</label>
                            <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ $user->dokter->nip }}" maxlength="16">
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor telepon</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ $user->dokter->nomor_telepon }}" maxlength="16">
                            @error('nomor_telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const image = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        imgPreview.style.width = '200px';
        imgPreview.style.margin = '1em 0';
        
        const ofReader = new FileReader();
        
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function (oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection