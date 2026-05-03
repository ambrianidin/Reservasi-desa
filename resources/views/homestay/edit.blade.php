@extends('be.master')
@section('content')
<div class="card mb-4">
    <h6 class="card-header">Create Homestay</h6>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success text-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('homestay.update', $homestays->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Name Homestay</label>
                    <input type="text" name="nama_penginapan" id="nama_penginapan" class="form-control" value="{{ $homestays->nama_penginapan ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Description</label>
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $homestays->deskripsi ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas" id="fasilitas" class="form-control" rows="5" style="resize: vertical; word-wrap: break-word;" required>{{ $homestays->fasilitas ?? '' }}</textarea>
                <div class="clearfix"></div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto1" class="form-label">Pict 1</label>
                    <input class="form-control" type="file" name="foto1" id="foto1" accept="image/*">

@if($homestays->foto1)
    <p class="mt-1">
        File saat ini:
        <a href="{{ asset('storage/' . $homestays->foto1) }}" target="_blank">
            Lihat Foto
        </a>
    </p>
@endif
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto2" class="form-label">Pict 2</label>
                    <input class="form-control" type="file" name="foto2" id="foto2" accept="image/*">

@if($homestays->foto2)
    <p class="mt-1">
        File saat ini:
        <a href="{{ asset('storage/' . $homestays->foto2) }}" target="_blank">
            Lihat Foto
        </a>
    </p>
@endif
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto3" class="form-label">Pict 3</label>
                    <input class="form-control" type="file" name="foto3" id="foto3" accept="image/*">

@if($homestays->foto3)
    <p class="mt-1">
        File saat ini:
        <a href="{{ asset('storage/' . $homestays->foto3) }}" target="_blank">
            Lihat Foto
        </a>
    </p>
@endif
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto4" class="form-label">Pict 4</label>
                    <input class="form-control" type="file" name="foto4" id="foto4" accept="image/*">

@if($homestays->foto4)
    <p class="mt-1">
        File saat ini:
        <a href="{{ asset('storage/' . $homestays->foto4) }}" target="_blank">
            Lihat Foto
        </a>
    </p>
@endif
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto5" class="form-label">Pict 5</label>
                    <input class="form-control" type="file" name="foto5" id="foto5" accept="image/*">

@if($homestays->foto5)
    <p class="mt-1">
        File saat ini:
        <a href="{{ asset('storage/' . $homestays->foto5) }}" target="_blank">
            Lihat Foto
        </a>
    </p>
@endif
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Create Homestay</button>
            <a href="{{ route('homestay') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
@endsection