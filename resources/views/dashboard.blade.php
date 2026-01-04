@extends('layouts/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-fw mr-2 fa-industry"></i>
    {{$title}}
</h1>

<div class="row">

    @if (auth()->user()->hak_akses =='Admin')
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Total Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAdmin }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-secret fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Setor Sampah</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSetor }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-recycle fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Belum Diverifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBelumVerifikasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-minus-square fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Sudah Diverifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTerverifikasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-square fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Point Diberikan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPoint }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-gift fa-2x text-black-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else

<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Sampah Disetor</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSetoran }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-truck fa-2x text-black-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Status Setor Sampah</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statusSetoran }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-history fa-2x text-black-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Setor Sampah Diverifikasi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSetoranBerhasil }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-check-square fa-2x text-black-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Point Diperoleh</div>
                    <div class="h5 mb-0 font-weight-bold text-black-800">{{ $totalPoint }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-gift fa-2x text-black-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@endif


@endsection