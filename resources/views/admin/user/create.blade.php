@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-plus"></i>
    {{$title}}
</h1>

<div class="card">
    <div class="card-header" style="background-color: #405742ff;">
        <a href="{{ route('user') }}" class="btn btn-sm text-white" style="background-color: #405742ff;">
            <i class="fas fa-reply fa-sm mr-2"></i>
            Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('userStore') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">
                        Nama :</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error ('name')
                    <small>
                        <span class="text-danger">{{ $message }}</span>
                    </small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">
                        Email :
                    </label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <small>
                        <span class=" text-danger">{{ $message }}</span>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">
                        Password :</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <small>
                        <span class="text-danger">{{ $message }}</span>
                    </small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">
                        Password Konfirmasi :</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                    @error('confirm_password')
                    <small>
                        <span class="text-danger">{{ $message }}</span>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-12 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">
                        Hak Akses :</label>
                    <select name="hak_akses" class="form-control @error('hak_akses') is-invalid @enderror">
                        <option value="" selected disabled>-- Pilih Hak Akses --</option>
                        <option value=" Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                    @error('hak_akses')
                    <small>
                        <span class="text-danger">{{ $message }}</span>
                    </small>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn text-white" style="background-color: #405742ff;">
                    <i class="fas fa-save fa-sm mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>

    @endsection