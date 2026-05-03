@extends('be.master')
@section('title', 'User Management')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">User Management</h5>
        <a href="{{ route('userM.create') }}"
           class="btn btn-sm d-inline-flex align-items-center gap-2"
           style="background:#1D9E75;color:#fff;border-radius:8px;font-size:13px;font-weight:500;padding:8px 16px;border:none">
            <i class="feather icon-plus" style="font-size:14px"></i>
            Tambah User
        </a>
    </div>

    {{-- Table Card --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Nama</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Email</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Alamat</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">No. HP</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Jabatan</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aktif</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Status</th>
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        {{-- No --}}
                        <td class="text-center text-muted" style="padding:12px 14px;font-size:12px;vertical-align:middle">
                            {{ $index + 1 }}
                        </td>

                        {{-- Nama --}}
                        <td style="padding:12px 14px;vertical-align:middle;font-weight:500;color:#1a1a1a">
                            {{ $user->karyawan->nama_karyawan ?? 'default' }}
                        </td>

                        {{-- Email --}}
                        <td style="padding:12px 14px;vertical-align:middle" class="text-muted">
                            {{ $user->email }}
                        </td>

                        {{-- Alamat --}}
                        <td style="padding:12px 14px;vertical-align:middle;max-width:160px">
                            <span class="text-muted d-block text-truncate"
                                  title="{{ $user->karyawan->alamat ?? 'user' }}"
                                  style="max-width:140px">
                                {{ \Illuminate\Support\Str::limit($user->karyawan->alamat ?? 'default', 20) }}
                            </span>
                        </td>

                        {{-- No HP --}}
                        <td style="padding:12px 14px;vertical-align:middle;white-space:nowrap" class="text-muted">
                            {{ $user->karyawan->no_hp ?? 'default' }}
                        </td>

                        {{-- Jabatan --}}
                        <td style="padding:12px 14px;vertical-align:middle" class="text-muted">
                            {{ $user->karyawan->jabatan ?? 'default' }}
                        </td>

                        {{-- Aktif --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            @if($user->aktif)
                                <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">Aktif</span>
                            @else
                                <span style="background:#FCEBEB;color:#791F1F;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">Tidak Aktif</span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            @if($user->aktif)
                                <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">Aktif</span>
                            @else
                                <span style="background:#FCEBEB;color:#791F1F;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">Banned</span>
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td class="text-center" style="padding:12px 14px;vertical-align:middle">
                            <div class="d-flex justify-content-center gap-2">

                                {{-- Edit --}}
                                <a href="{{ route('userM.edit', $user->id) }}"
                                   style="width:32px;height:32px;background:#FAEEDA;border-radius:6px;display:inline-flex;align-items:center;justify-content:center">
                                    <i class="feather icon-edit-2" style="font-size:13px;color:#854F0B"></i>
                                </a>

                                {{-- Ban --}}
                                @if($user->aktif)
                                <form action="{{ route('userM.ban', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin ban user ini?')" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            style="width:32px;height:32px;background:#FCEBEB;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;border:none;cursor:pointer">
                                        <i class="feather icon-user-x" style="font-size:13px;color:#A32D2D"></i>
                                    </button>
                                </form>

                                {{-- Unban --}}
                                @elseif($user->status == 0)
                                <form action="{{ route('userM.unban', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin unban user ini?')" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                            style="width:32px;height:32px;background:#EAF3DE;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;border:none;cursor:pointer">
                                        <i class="feather icon-user-check" style="font-size:13px;color:#27500A"></i>
                                    </button>
                                </form>
                                @endif

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