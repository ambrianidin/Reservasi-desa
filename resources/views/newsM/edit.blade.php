@extends('be.master')
@section('content')
<div class="card mb-4">
    <h6 class="card-header">Create News</h6>
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
        <form action="{{ route('newsM.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="tgl_post" id="tgl_post" class="form-control" value="{{ $berita->tgl_post ?? '' }}" required>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">News Content</label>
                <textarea name="berita" id="berita" class="form-control" rows="5" style="resize: vertical; word-wrap: break-word;" required>{{ $berita->berita }}</textarea>
                <div class="clearfix"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="form-label">Category News</label>
                    <select name="id_kategori_berita" id="id_kategori_berita" class="form-control custom-select" required>
                        <option value="">Select Category</option>
                        @foreach (\App\Models\KategoriBerita::all() as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_berita }}</option>
                        @endforeach
                    </select>  
                </div>
                <div class="form-group mt-4 col-md-2">
                    <a href="#" class="btn btn-pill btn-info" data-toggle="modal" data-target="#categoryModal">
                        <i class="feather icon-plus-square"></i>
                    </a>
                </div>
                <div class="form-group col-md-6">
                    <label for="foto" class="form-label">Pict News</label>
                    <input class="form-control" type="file" name="foto" id="foto" accept="image/*"required value="{{ $berita->foto }}">
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Create News</button>
            <a href="{{ route('newsM') }}" class="btn btn-danger">Cancel</a>
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
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="new_category">Category Name</label>
                        <input type="text" class="form-control" id="new_category" name="kategori_berita" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection