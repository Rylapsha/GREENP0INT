@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-plus"></i>
    {{$title}}
</h1>

<div class="card">
    <div class="card-header" style="background-color: #405742ff;">
        <a href="{{ route('kelola') }}" class="btn btn-sm text-white" style="background-color: #405742ff;">
            <i class="fas fa-reply fa-sm mr-2"></i>
            Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('kelolaStore') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-xl-12 mb-2">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">Nama Pengguna</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Nama Pengguna --</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-12 mb-2">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Contoh: Jl. Merdeka No. 10, RT 02/RW 05, Kel. Sukamaju">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">Jenis Sampah</label>
                    <select name="jenis_sampah" class="form-control @error('jenis_sampah') is-invalid @enderror">
                        <option value="" disabled selected>-- Pilih Jenis Sampah --</option>
                        <option value="Organik">Organik</option>
                        <option value="Anorganik">Anorganik</option>
                        <option value="B3">B3</option>
                    </select>
                    @error('jenis_sampah')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-xl-6 mb-1">
                    <span class="text-danger">*</span>
                    <label class="form-label font-weight-bold">Berat Sampah (gram)</label>
                    <input type="number" name="berat_sampah" class="form-control @error('berat_sampah') is-invalid @enderror" value="{{ old('berat_sampah') }}" placeholder="Contoh: 1000">
                    @error('berat_sampah')
                    <small class="text-danger">{{ $message }}</small>
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