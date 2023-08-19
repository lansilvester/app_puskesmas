@extends('admin.layouts.base')

@section('content')
<style>
    svg{
        width:20px;
    }
</style>
<div class="container-fluid mt-5">
    <form class="d-none d-sm-inline-block mb-3" action="{{ route('search.user') }}" method="GET">
        <div class="input-group">
            @if(request()->has('search'))
            <a href="{{ route('users.index') }}" class="btn">
                <i class="fas fa-times"></i>
            </a>
            @endif
            <input type="text" class="form-control" placeholder="Cari User..."
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
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
            <div class="card-header">
                    <h2>Data Users</h2>
                    <div class="my-2 d-flex justify-content-start">
                        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
            </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($data_users as $user)
                            @if(Auth::user()->id !== $user->id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @if($user->photo)
                                            <img class="img-profile rounded shadow" src="{{ asset($user->photo) }}" width="150px">
                                        @else
                                            <img class="img-profile rounded-circle" src="https://www.nicepng.com/png/detail/933-9332131_profile-picture-default-png.png" width="150px">
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        <div class="d-flex" style="justify-content:space-around">
                                            <a href="{{ route('users.show', ['user'=>$user->id]) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('users.edit', ['user'=>$user->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-warning">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $data_users->links() }}
                    </div >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection