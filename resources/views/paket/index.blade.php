@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Paket Wisata</h5>
        <a href="{{ route('paketWisata.create') }}" class="btn btn-sm d-inline-flex align-items-center gap-2"
           style="background:#1D9E75;color:#fff;border-radius:8px;font-size:13px;font-weight:500;padding:8px 16px;border:none">
            <i class="feather icon-plus" style="font-size:14px"></i>
            Tambah Paket
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Nama Paket</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Deskripsi</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Fasilitas</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Harga</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Foto</th>
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paketWisatas as $index => $paketwisata)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        {{-- No --}}
                        <td class="text-center text-muted" style="padding:12px 14px;font-size:12px;vertical-align:middle">
                            {{ $index + 1 }}
                        </td>

                        {{-- Nama Paket --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:150px">
                            <span style="font-weight:500;color:#1a1a1a;display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"
                                  title="{{ $paketwisata->nama_paket }}">
                                {{ Str::limit($paketwisata->nama_paket, 20) }}
                            </span>
                        </td>

                        {{-- Deskripsi --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:160px">
                            <span class="text-muted" style="display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"
                                  title="{{ $paketwisata->deskripsi }}">
                                {{ Str::limit($paketwisata->deskripsi, 25) }}
                            </span>
                        </td>

                        {{-- Fasilitas --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:180px">
                            <span class="text-muted" style="display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap"
                                  title="{{ $paketwisata->fasilitas }}">
                                {{ Str::limit($paketwisata->fasilitas, 30) }}
                            </span>
                        </td>

                        {{-- Harga --}}
                        <td style="padding:12px 14px;vertical-align:middle;white-space:nowrap;font-weight:500">
                            {{ Str::limit($paketwisata->harga_per_pack, 20) }}
                        </td>

                        {{-- Foto (gabungan 5 kolom jadi 1) --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            <div class="d-flex gap-1">
                                @foreach(['foto1','foto2','foto3','foto4','foto5'] as $foto)
                                    @if($paketwisata->$foto)
                                        <img src="{{ asset('storage/' . $paketwisata->$foto) }}"
                                             alt="{{ $foto }}"
                                             style="width:40px;height:40px;object-fit:cover;border-radius:6px;border:0.5px solid rgba(0,0,0,0.08)">
                                    @else
                                        <div style="width:40px;height:40px;border-radius:6px;background:#f5f5f5;border:0.5px solid rgba(0,0,0,0.08);display:flex;align-items:center;justify-content:center">
                                            <i class="feather icon-image" style="font-size:13px;color:#bbb"></i>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </td>

                        {{-- Aksi --}}
                        <td class="text-center" style="padding:12px 14px;vertical-align:middle">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('paketWisata.edit', $paketwisata->id) }}"
                                   style="width:32px;height:32px;background:#FAEEDA;border-radius:6px;display:inline-flex;align-items:center;justify-content:center">
                                    <i class="feather icon-edit-2" style="font-size:13px;color:#854F0B"></i>
                                </a>
                                <form action="{{ route('paketWisata.destroy', $paketwisata->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="width:32px;height:32px;background:#FCEBEB;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;border:none;cursor:pointer">
                                        <i class="feather icon-trash-2" style="font-size:13px;color:#A32D2D"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection