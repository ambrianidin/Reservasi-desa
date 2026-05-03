@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Obyek Wisata</h5>
        <a href="{{ route('obyek-wisata.create') }}"
           class="btn btn-sm d-inline-flex align-items-center gap-2"
           style="background:#1D9E75;color:#fff;border-radius:8px;font-size:13px;font-weight:500;padding:8px 16px;border:none">
            <i class="feather icon-plus" style="font-size:14px"></i>
            Tambah Obyek Wisata
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Nama Wisata</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Deskripsi</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Kategori</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Fasilitas</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Foto</th>
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $obyek)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        {{-- No --}}
                        <td class="text-center text-muted" style="padding:12px 14px;font-size:12px;vertical-align:middle">
                            {{ $index + 1 }}
                        </td>

                        {{-- Nama Wisata --}}
                        <td style="padding:12px 14px;vertical-align:middle;font-weight:500;color:#1a1a1a;max-width:150px">
                            <span class="d-block text-truncate" title="{{ $obyek->nama_wisata }}" style="max-width:140px">
                                {{ Str::limit($obyek->nama_wisata, 20) }}
                            </span>
                        </td>

                        {{-- Deskripsi --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:180px">
                            <span class="text-muted d-block text-truncate"
                                  title="{{ $obyek->deskripsi_wisata }}"
                                  style="max-width:170px">
                                {{ Str::limit($obyek->deskripsi_wisata, 30) }}
                            </span>
                        </td>

                        {{-- Kategori --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            <span style="background:#E6F1FB;color:#0C447C;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                {{ Str::limit($obyek->kategoriWisata ? $obyek->kategoriWisata->kategori_wisata : '-', 20) }}
                            </span>
                        </td>

                        {{-- Fasilitas --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:160px">
                            <span class="text-muted d-block text-truncate"
                                  title="{{ $obyek->fasilitas }}"
                                  style="max-width:150px">
                                {{ Str::limit($obyek->fasilitas, 25) }}
                            </span>
                        </td>

                        {{-- Foto (5 foto digabung jadi 1 kolom) --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            <div class="d-flex gap-1">
                                @foreach(['foto1','foto2','foto3','foto4','foto5'] as $foto)
                                    @if($obyek->$foto)
                                        <img src="{{ asset('storage/' . $obyek->$foto) }}"
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
                                <a href="{{ route('obyek-wisata.edit', $obyek->id) }}"
                                   style="width:32px;height:32px;background:#FAEEDA;border-radius:6px;display:inline-flex;align-items:center;justify-content:center">
                                    <i class="feather icon-edit-2" style="font-size:13px;color:#854F0B"></i>
                                </a>
                                <form action="{{ route('obyek-wisata.destroy', $obyek->id) }}" method="POST" class="d-inline">
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