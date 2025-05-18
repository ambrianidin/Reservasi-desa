@extends('be.master')
@section('content')
<hr class="border-light container-m--x my-4">
<div class="card col-12">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
      <h3 class="font-weight-bold align-items-center mt-3">News Management</h3>
      <div class="ms-auto">
        <a href="{{ route('newsM.create') }}" type="submit" class="btn btn-round btn-outline-success">
          <i class="feather icon-plus-circle mr-2"></i>Add News
        </a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Berita</th>
          <th>Tanggal</th>
          <th>Foto</th>
          <th>Kategori</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($beritas as $index => $berita)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ Str::limit($berita->judul, 20)}}</td>
              <td class="text-truncate" style="max-width: 200px;" title="{{ $berita->berita }}">{{ Str::limit($berita->berita, 50) }}</td>
                <td>{{ $berita->tgl_post ? \Carbon\Carbon::parse($berita->tgl_post)->format('d F, Y') : '' }}</td>
                <td>
                    @if ($berita->foto)
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="img-fluid" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                <td>{{ $berita->kategori->kategori_berita }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('newsM.edit', $berita->id) }}" type="button" class="btn btn-warning"><i class="feather icon-edit-1"></i></a>
                    <form action="{{ route('newsM.destroy', $berita->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="feather icon-trash-2"></i></button>
                    </form>
                  </div>
                    
                </td>
            </tr>
        @endforeach        
      </tbody>
    </table>
</div>
                            
@endsection