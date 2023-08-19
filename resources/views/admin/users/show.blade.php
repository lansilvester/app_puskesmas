@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3>User Details</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($user->photo)
                            <img src="{{ asset($user->photo) }}" class="img-fluid" style="width: 200px;" alt="User Photo">
                        @else
                            <img class="img-fluid" src="https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png" width="200px">
                        @endif
                    </div>
                    <div class="my-4">
                        <h4 class="mb-0">{{ $user->name }}</h4>
                        <b>{{ $user->email }}</b>
                    </div>
                    <hr>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="mb-4">
                        @if(Auth::user()->role == 'dokter' && $user->dokter)
                            <p class="mb-3"><strong>NIP</strong><br> {{ $user->dokter->nip }}</p>
                            <p class="mb-3"><strong>Spesialisasi:</strong><br> @if($user->dokter->spesialisasi){{ $user->dokter->spesialisasi }}@endif</p>
                            <p class="mb-3"><strong>Nomor Telepon:</strong><br> {{ $user->dokter->nomor_telepon }}</p>
                        @endif
                        <p class="mb-3"><strong>NIK:</strong><br> {{ $user->nik }}</p>
                        <p class="mb-3"><strong>Role</strong><br><span class="badge badge-success text-md">{{ ucfirst($user->role) }}</span></p>
                        <p class="mb-3"><strong>Jenis Kelamin:</strong><br>
                         @if($user->jenis_kelamin)
                         {{ ucfirst($user->jenis_kelamin) }}
                         @endif
                        </p>
                        <p class="mb-3"><strong>Alamat:</strong><br> @if($user->alamat){{ $user->alamat }}@endif</p>
                    </div>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success"><i class="fas fa-pen"></i> Update</a>
                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

