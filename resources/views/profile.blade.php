@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-wrench"></i>
    {{$title}}
</h1>

@if(session('success'))
<div class="alert alert-success shadow">
    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header" style="background-color: #405742ff;">
        <a href="{{ route('user') }}" class="btn btn-sm text-white" style="background-color: #405742ff;">
            <i class="fas fa-reply fa-sm mr-2"></i>
            Kembali
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $user->nama) }}">
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <hr>
                        <div class="form-group">
                            <label class="font-weight-bold">Password Baru</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-block text-white" style="background-color: #405742ff;">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection