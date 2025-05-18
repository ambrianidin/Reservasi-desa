@extends('be.master')
@section('content')
<hr class="border-light container-m--x my-4">
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('pemilik.export.pdf') }}" class="btn btn-round btn-outline-secondary"><i class="feather icon-download mr-2"></i>Download Data</a>
</div>
<div class="row">
    <div class="col-md-10">
        <div class="d-flex w-100 mb-4">
            <di class="row no-gutters row-bordered row-border-light h-100">
            <div class="container py-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card mb-4 bg-pattern-3 bg-primary text-white shadow-sm h-100">
                            <div class="card-body">
                                <i class="feather icon-bar-chart-2 display-4"></i>
                                <h5 class="card-title">Total Pendapatan</h5>
                                <p class="display-6 fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                                <small class="text-white-50">Dari semua reservasi yang selesai</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-pattern-3-dark text-primary shadow-sm h-100">
                            <div class="card-body">
                                <div class="feather icon-calendar display-4"></div>
                                <h5 class="card-title">Total Reservasi</h5>
                                <p class="display-6 fw-bold">{{ $totalReservasi }}x</p>
                                <small class="text-primary">Termasuk yang masih dalam proses</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection