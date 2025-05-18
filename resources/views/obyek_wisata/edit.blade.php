@extends('be.master')
@section('content')
<div class="card mb-4">
    <h6 class="card-header">Create Obyek Wisata</h6>
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
        <form action="{{ route('obyek-wisata.update', $obyeks->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Name Wisata</label>
                    <input type="text" name="nama_wisata" id="nama_wisata" class="form-control" value="{{ $obyeks->nama_wisata ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Description Wisata</label>
                    <input type="text" name="deskripsi_wisata" id="deskripsi_wisata" class="form-control" value="{{ $obyeks->deskripsi_wisata ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Fasilitas</label>
                <textarea name="fasilitas" id="fasilitas" class="form-control" rows="5" style="resize: vertical; word-wrap: break-word;" required>{{ $obyeks->fasilitas ?? '' }}</textarea>
                <div class="clearfix"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="form-label">Category Wisata</label>
                    <select name="id_kategori_wisata" id="id_kategori_wisata" class="form-control custom-select" required>
                        <option value="">Select Category</option>
                        @foreach (\App\Models\KategoriWisata::all() as $kategoriW)
                            <option value="{{ $kategoriW->id }}" >
                                {{ $kategoriW->kategori_wisata }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-4 col-md-2">
                    <a href="#" class="btn btn-pill btn-info" data-toggle="modal" data-target="#categoryModal">
                        <i class="feather icon-plus-square"></i>
                    </a>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto1" class="form-label">Pict 1</label>
                    <input class="form-control" type="file" name="foto1" id="foto1" accept="image/*" value="{{ $obyeks->foto1 ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto2" class="form-label">Pict 2</label>
                    <input class="form-control" type="file" name="foto2" id="foto2" accept="image/*" value="{{ $obyeks->foto2 ?? '' }}" required>
                    @error('foto2')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto3" class="form-label">Pict 3</label>
                    <input class="form-control" type="file" name="foto3" id="foto3" accept="image/*" value="{{ $obyeks->foto3 ?? '' }}" required>
                    @error('foto3')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto4" class="form-label">Pict 4</label>
                    <input class="form-control" type="file" name="foto4" id="foto4" accept="image/*" value="{{ $obyeks->foto4 ?? '' }}">
                    @error('foto4')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto5" class="form-label">Pict 5</label>
                    <input class="form-control" type="file" name="foto5" id="foto5" accept="image/*" value="{{ $obyeks->foto5 ?? '' }}">
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Edit Wisata</button>
            <a href="{{ route('obyek-wisata') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
<!-- Modal for Adding Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategoriWisata.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama_wisata" value="{{ old('nama_wisata', session('form_data.nama_wisata')) }}">
                    <input type="hidden" name="deskripsi_wisata" value="{{ old('deskripsi_wisata', session('form_data.deskripsi_wisata')) }}">
                    <input type="hidden" name="fasilitas" value="{{ old('fasilitas', session('form_data.fasilitas')) }}">
                    <input type="hidden" name="id_kategori_wisata" value="{{ old('id_kategori_wisata', session('form_data.id_kategori_wisata')) }}">
                    <div class="form-group">
                        <label for="new_category">Category Name</label>
                        <input type="text" class="form-control" id="new_category" name="kategori_wisata" required>
                        @error('kategori_wisata')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection