@extends('admin.layouts.base')

@section('content')
<div class="container-fluid">
    <form class="d-none d-sm-inline-block mb-3" action="{{ route('search.pasien') }}" method="GET">
        <div class="input-group">
            @if(request()->has('search'))
            <a href="{{ route('pasien.index') }}" class="btn">
                <i class="fas fa-times"></i>
            </a>
            @endif
            <select class="form-control" id="search_by" name="search_by">
                <option value="nama" @if(request('search_by') === 'nama') selected @endif>Nama</option>
                <option value="nik" @if(request('search_by') === 'nik') selected @endif>NIK</option>
                <option value="alamat" @if(request('search_by') === 'alamat') selected @endif>Alamat</option>
            </select>
            <input type="text" class="form-control w-50" placeholder="Cari Pasien..."
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
    <div class="card">
        <div class="card-header">
            <h1>Daftar Pasien</h1>
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Auth::user()->role == 'admin')
            <div class="d-flex justify-content-between">
                <a href="{{ route('pasien.create') }}" class="btn btn-success mb-2"><i class="fas fa-user-plus"></i> Tambah data pasien</a>
            </div>
            @endif
        </div>
        <div class="card-body">
            
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Keluhan</th>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')   
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
                $no =1;
            @endphp
            @forelse($data_pasien as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->nomor_telepon }}</td>
                    <td>{{ $data->keluhan }}</td>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')   
                    <td>
                        <a href="{{ route('pasien.show', ['pasien' => $data->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('pasien.edit', ['pasien' => $data->id]) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('pasien.destroy', ['pasien' => $data->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda ingin menghapus data pasien?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="8" align="center">Data pasien kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data_pasien->links() }}
        </div>
    </div>
</div>

@endsection
