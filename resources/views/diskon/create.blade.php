@extends('be.master')
@section('content')
<div class="card mb-4">
    <h6 class="card-header">Create Diskon</h6>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('diskonM.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Nama Diskon</label>
                    <input type="text" name="nama_diskon" id="nama_diskon" class="form-control" value="{{ old('nama_diskon') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Persentase (%)</label>
                    <input type="number" name="persentase_diskon" id="persentase_diskon" class="form-control" value="{{ old('persentase_diskon') }}" min="0" max="100" step="0.01" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" value="{{ old('tanggal_berakhir') }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Create Diskon</button>
            <a href="{{ route('diskonM') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
@endsection