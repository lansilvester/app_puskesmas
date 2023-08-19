@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Poliklinik</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('poliklinik.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Data</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Poliklinik</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($poliklinik as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->deskripsi ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('poliklinik.edit', $data->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="{{ route('poliklinik.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this poliklinik?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
