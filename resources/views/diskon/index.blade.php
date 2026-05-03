@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Diskon Management</h5>
        <a href="{{ route('diskonM.create') }}"
           class="btn btn-sm d-inline-flex align-items-center gap-2"
           style="background:#1D9E75;color:#fff;border-radius:8px;font-size:13px;font-weight:500;padding:8px 16px;border:none">
            <i class="feather icon-plus" style="font-size:14px"></i>
            Tambah Diskon
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Nama Diskon</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Persentase</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Tgl Mulai</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Tgl Berakhir</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Status</th>
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diskons as $diskon)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        {{-- No --}}
                        <td class="text-center text-muted" style="padding:12px 14px;font-size:12px;vertical-align:middle">
                            {{ $loop->index + 1 }}
                        </td>

                        {{-- Nama Diskon --}}
                        <td style="padding:12px 14px;vertical-align:middle;font-weight:500;color:#1a1a1a">
                            {{ $diskon->nama_diskon ?? '-' }}
                        </td>

                        {{-- Persentase --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                {{ $diskon->persentase_diskon }}%
                            </span>
                        </td>

                        {{-- Tgl Mulai --}}
                        <td style="padding:12px 14px;vertical-align:middle;white-space:nowrap" class="text-muted">
                            {{ $diskon->tanggal_mulai ? \Carbon\Carbon::parse($diskon->tanggal_mulai)->format('d F, Y') : '-' }}
                        </td>

                        {{-- Tgl Berakhir --}}
                        <td style="padding:12px 14px;vertical-align:middle;white-space:nowrap" class="text-muted">
                            {{ $diskon->tanggal_berakhir ? \Carbon\Carbon::parse($diskon->tanggal_berakhir)->format('d F, Y') : '-' }}
                        </td>

                        {{-- Status --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            @if($diskon->status == 'aktif')
                                <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                    Aktif
                                </span>
                            @else
                                <span style="background:#F5F5F5;color:#777;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                    {{ ucfirst($diskon->status) }}
                                </span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td class="text-center" style="padding:12px 14px;vertical-align:middle">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('diskonM.edit', $diskon->id) }}"
                                   style="width:32px;height:32px;background:#FAEEDA;border-radius:6px;display:inline-flex;align-items:center;justify-content:center">
                                    <i class="feather icon-edit-2" style="font-size:13px;color:#854F0B"></i>
                                </a>
                                <form action="{{ route('diskonM.destroy', $diskon->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data?')">
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