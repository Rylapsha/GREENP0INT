@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-recycle"></i>
    {{$title}}
</h1>

<div class="card shadow">
    

    <div class="card-body">
        {{-- Alert Success --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('setor/proses') }}" method="POST">
            @csrf
            {{-- Nama User --}}
            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
            </div>

            {{-- Alamat --}}
            <div class="form-group">
                <span class="text-danger">*</span>
                <label class="font-weight-bold">Alamat</label>
                <textarea
                    name="alamat"
                    class="form-control @error('alamat') is-invalid @enderror"
                    placeholder="Contoh: Jl. Merdeka No. 10, RT 02/RW 05, Kel. Sukamaju">{{ old('alamat') }}</textarea>
                @error('alamat')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row">
                {{-- Jenis Sampah --}}
                <div class="col-md-6">
                    <span class="text-danger">*</span>
                    <label class="font-weight-bold">Jenis Sampah</label>
                    <select
                        name="jenis_sampah"
                        class="form-control @error('jenis_sampah') is-invalid @enderror">
                        <option value=""disabled selected>-- Pilih Jenis Sampah --</option>
                        <option value="Organik">Organik</option>
                        <option value="Anorganik">Anorganik</option>
                        <option value="B3">B3</option>
                    </select>
                    @error('jenis_sampah')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Berat --}}
                <div class="col-md-6">
                    <span class="text-danger">*</span>
                    <label class="font-weight-bold">Berat Sampah (gram)</label>
                    <input
                        type="number"
                        name="berat_sampah"
                        class="form-control @error('berat_sampah') is-invalid @enderror"
                        placeholder="Contoh: 1500"
                        min="1"
                        value="{{ old('berat_sampah') }}">
                    @error('berat_sampah')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn text-white" style="background-color: #405742ff;">
                    <i class="fas fa-eject mr-2"></i>
                    Setor Sampah
                </button>
            </div>
        </form>
    </div>
</div>

@endsection