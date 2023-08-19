@extends('admin.layouts.base')

@section('content')
<div class="container">
    <form class="d-none d-sm-inline-block mb-3" action="{{ route('search.apotek') }}" method="GET">
        <div class="input-group">
            @if(request()->has('search'))
            <a href="{{ route('apotek.index') }}" class="btn">
                <i class="fas fa-times"></i>
            </a>
            @endif
            <select class="form-control" id="search_by" name="search_by">
                <option value="nama_obat" @if(request('search_by') === 'nama_obat') selected @endif>Nama Obat</option>
                <option value="jenis" @if(request('search_by') === 'jenis') selected @endif>Jenis</option>
            <input type="text" class="form-control w-50" placeholder="Cari Obat..."
                aria-label="Search" aria-describedby="basic-addon2" name="search" value={{ request()->search }}>
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            @if(request()->has('search'))
            <p>Data tentang <i>`{{ request()->search }}`</i></p>
            @endif
            <h1>Daftar Obat di Apotek</h1>
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
        </div>
        <div class="card-body">
            <a href="{{ route('apotek.create') }}" class="btn btn-success my-3"><i class="fas fa-plus"></i> Tambah data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Jenis</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_obat as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_obat }}</td>
                        <td>{{ $data->jenis }}</td>
                        <td>Rp.{{ $data->harga }}</td>
                        <td>{{ $data->stok }}</td>
                        <td>
                            <a href="{{ route('apotek.edit', ['apotek' => $data->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('apotek.destroy', ['apotek' => $data->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this obat?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" align="center">Data Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>        
        </div>
    </div>
</div>
@endsection
