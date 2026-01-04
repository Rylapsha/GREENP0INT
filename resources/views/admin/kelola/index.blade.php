@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-tasks"></i>
    {{$title}}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap">
        <div>
            <a href="{{ route('kelolaCreate') }}" class="btn btn-sm text-white" style="background-color: #405742ff;">
                <i class="fas fa-plus fa-sm mr-2"></i>
                Tambah Data
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-white" style="background-color: #405742ff;">
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Sampah</th>
                        <th>Berat Sampah</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Point</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelola as $item)
                    <tr>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="text-center">
                            @if ($item->jenis_sampah == 'Organik')
                            <span class="badge badge-success">
                                {{ $item->jenis_sampah }}
                            </span>
                            @elseif ($item->jenis_sampah == 'Anorganik')
                            <span class="badge badge-info">
                                {{ $item->jenis_sampah }}
                            </span>
                            @elseif ($item->jenis_sampah == 'B3')
                            <span class="badge badge-warning">
                                {{ $item->jenis_sampah }}
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $item->berat_formatted }}
                        </td>
                        <td class="text-center">
                            @if ($item->status == 'belum diverifikasi')
                            <span class="badge badge-danger">
                                {{ $item->status }}
                            </span>
                            @else
                            <span class="badge badge-success">
                                {{ $item->status }}
                            </span>
                            @endif
                        </td>
                        <td>{{ $item->tanggal_verifikasi}}</td>
                        <td>{{ $item->point }}</td>
                        <td class="text-center">
                            @if($item->status == 'belum diverifikasi')
                            <form action="{{ route('kelola.verifikasi', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-check mr-2"></i>
                                    Verifikasi
                                </button>
                            </form>
                            @else
                            <form action="{{ route('kelola.batalVerifikasi', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-times mr-2"></i>
                                    Batalkan
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection