@extends('admin.layouts.base')

@section('content')
<div class="container-fluid">
   
    <div class="card">
        <div class="card-header">
            <h2>Data Seluruh Dokter</h2>
            <div class="my-3 d-flex" style="justify-content: space-between">
          
            </div>
        </div>
        <div class="card-body">
            
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Nomor HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse ($users as $dokter)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        @if($dokter->user->photo)
                        <img class="img-profile rounded shadow" src="{{ asset($dokter->user->photo) }}" width="150px">
                        @else
                        <img class="img-profile" src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" width="150px">
                        @endif
                    </td>
                    <td>{{ $dokter->nip }}</td>
                    <td>{{ $dokter->user->name }}</td>
                    <td>{{ $dokter->spesialisasi }}</td>
                    <td>{{ $dokter->nomor_telepon }}</td>
                    <td>
                        <div class="d-flex" style="justify-content:space-around">
                            @if(Auth::user()->role == 'admin')
                            <a href="{{ route('dokter.show', ['dokter'=>$dokter->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            @endif
                            @if(Auth::user()->role == 'pegawai')
                            @if($dokter->role !== 'admin')
                            <a href="{{ route('dokter.show', ['dokter'=>$dokter->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            @else
                            <a href="{{ route('dokter.show', ['dokter'=>$dokter->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            @endif
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-warning">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
@endsection
