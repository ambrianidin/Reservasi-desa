@extends('be.master')
@section('content')
<hr class="border-light container-m--x my-4">
<div class="card col-12">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
      <h3 class="font-weight-bold align-items-center mt-3">Obyek Wisata</h3>
      <div class="ms-auto">
        <a href="{{ route('obyek-wisata.create') }}" type="submit" class="btn btn-round btn-outline-success">
          <i class="feather icon-plus-circle mr-2"></i>Add obyek wisata
        </a>
      </div>
    </div>
  </div>
  <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Name Wisata</th>
                <th>Description Wisata</th>
                <th>Category Wisata</th>
                <th>Fasilitas</th>
                <th>Foto 1</th>
                <th>Foto 2</th>
                <th>Foto 3</th>
                <th>Foto 4</th>
                <th>Foto 5</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $obyek)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $obyek->nama_wisata }}">{{ Str::limit($obyek->nama_wisata, 10)}}</td>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $obyek->deskripsi_wisata }}">{{ Str::limit($obyek->deskripsi_wisata, 10)}}</td>
                    <td>{{ Str::limit($obyek->kategoriWisata ? $obyek->kategoriWisata->kategori_wisata : '', 20) }}</td>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $obyek->fasilitas }}">{{ Str::limit($obyek->fasilitas, 20)}}</td>
                    <td>
                        @if ($obyek->foto1)
                        <img src="{{ asset('storage/' . $obyek->foto1) }}" alt="" style="width: 60px">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($obyek->foto2)
                            <img src="{{ asset('storage/' . $obyek->foto2) }}" alt="Foto 2" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($obyek->foto3)
                            <img src="{{ asset('storage/' . $obyek->foto3) }}" alt="Foto 3" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($obyek->foto4)
                            <img src="{{ asset('storage/' . $obyek->foto4) }}" alt="Foto 4" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($obyek->foto5)
                            <img src="{{ asset('storage/' . $obyek->foto5) }}" alt="Foto 5" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('obyek-wisata.edit', $obyek->id) }}" type="button" class="btn btn-warning"><i class="feather icon-edit-1"></i></a>
                            <form action="{{ route('obyek-wisata.destroy', $obyek->id) }}" method="POST">
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