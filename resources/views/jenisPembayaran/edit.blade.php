@extends('be.master')
@section('content')
<div class="card mb-4">
    <h6 class="card-header">Create Jenis Pembayaran</h6>
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
        <form action="{{ route('jenisPembayaran.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Nama Rekening</label>
                    <input type="text" name="nama_rekening" id="nama_rekening" class="form-control" value="{{ $data->nama_rekening }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control" value="{{ $data->nomor_rekening }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Atas Nama</label>
                    <input type="text" name="atas_nama" id="atas_nama" class="form-control" value="{{ $data->atas_nama }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Update Jenis Pembayaran</button>
            <a href="{{ route('jenisPembayaran') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
@endsection