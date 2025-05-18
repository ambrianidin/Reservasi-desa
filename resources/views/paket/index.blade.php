@extends('be.master')
@section('content')
<div class="row">
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
      <h3 class="font-weight-bold align-items-center mt-3">Paket Wisata</h3>
      <div class="ms-auto">
        <a href="{{ route('paketWisata.create') }}" type="submit" class="btn btn-round btn-outline-success">
          <i class="feather icon-plus-circle mr-2"></i>Add Paket wisata
        </a>
      </div>
    </div>
  </div>
  <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Name Paket</th>
                <th>Description</th>
                <th>Fasilitas</th>
                <th>Price</th>
                <th>Foto 1</th>
                <th>Foto 2</th>
                <th>Foto 3</th>
                <th>Foto 4</th>
                <th>Foto 5</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paketWisatas as $index => $paketwisata)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $paketwisata->nama_wisata }}">{{ Str::limit($paketwisata->nama_paket, 10)}}</td>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $paketwisata->deskripsi_wisata }}">{{ Str::limit($paketwisata->deskripsi, 10)}}</td>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $paketwisata->fasilitas }}">{{ Str::limit($paketwisata->fasilitas, 20)}}</td>
                    <td class="text-truncate" style="max-width: 200px;" title="{{ $paketwisata->harga_per_pack }}">{{ Str::limit($paketwisata->harga_per_pack, 20)}}</td>
                    <td>
                        @if ($paketwisata->foto1)
                        <img src="{{ asset('storage/' . $paketwisata->foto1) }}" alt="" style="width: 60px">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($paketwisata->foto2)
                            <img src="{{ asset('storage/' . $paketwisata->foto2) }}" alt="Foto 2" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($paketwisata->foto3)
                            <img src="{{ asset('storage/' . $paketwisata->foto3) }}" alt="Foto 3" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($paketwisata->foto4)
                            <img src="{{ asset('storage/' . $paketwisata->foto4) }}" alt="Foto 4" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        @if ($paketwisata->foto5)
                            <img src="{{ asset('storage/' . $paketwisata->foto5) }}" alt="Foto 5" class="img-fluid" style="max-width: 60px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('paketWisata.edit', $paketwisata->id) }}" type="button" class="btn btn-warning"><i class="feather icon-edit-1"></i></a>
                            <form action="{{ route('paketWisata.destroy', $paketwisata->id) }}" method="POST">
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
@endsection