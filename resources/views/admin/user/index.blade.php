@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-user"></i>
    {{$title}}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap">
        <div>
            <a href="{{ route('userCreate') }}" class="btn btn-sm text-white" style="background-color: #405742ff;">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Hak Akses</th>
                        <th>Total Point</th>
                        <th>
                            <i class="fas fa-cog"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td class="text-center">
                            <span class="badge badge-success mr-2">
                                {{ $user->email }}
                            </span>
                        </td>
                        <td>********</td>
                        <td class="text-center">
                            @if ($user->hak_akses == 'Admin')
                            <span class="badge badge-danger">
                                {{ $user->hak_akses }}
                            </span>
                            @else
                            <span class="badge badge-dark">
                                {{ $user->hak_akses }}
                            </span>
                            @endif
                        </td>
                        <td>{{ $user->total_point }}</td>
                        <td class="text-center">
                            <a href="{{ route('userEdit',$user->id )}}" class="btn btn-sm btn-dark">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-danger"
                                data-toggle="modal"
                                data-target="#exampleModal{{ $user->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                            @include('admin/user/modal')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection