@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Dashboard Bendahara</h5>
        <small class="text-muted">Ringkasan keuangan & reservasi</small>
    </div>

    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:#185FA5;border-radius:12px">
                <div class="card-body p-4">
                    <div class="mb-3" style="width:36px;height:36px;background:rgba(255,255,255,0.18);border-radius:8px;display:flex;align-items:center;justify-content:center">
                        <i class="feather icon-trending-up text-white" style="font-size:16px"></i>
                    </div>
                    <p class="mb-1" style="font-size:12px;color:rgba(255,255,255,0.65);font-weight:500">Total Pendapatan</p>
                    <h4 class="text-white mb-1" style="font-weight:500;letter-spacing:-0.3px">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;background:#f5f6fa">
                <div class="card-body p-4">
                    <div class="mb-3" style="width:36px;height:36px;background:#E6F1FB;border-radius:8px;display:flex;align-items:center;justify-content:center">
                        <i class="feather icon-calendar" style="font-size:16px;color:#185FA5"></i>
                    </div>
                    <p class="mb-1 text-muted" style="font-size:12px;font-weight:500">Total Reservasi</p>
                    <h4 class="mb-1" style="font-weight:500;color:#1a1a1a;letter-spacing:-0.3px">
                        {{ number_format($totalReservasi, 0, ',', '.') }}
                        <span class="text-muted" style="font-size:14px;font-weight:400">transaksi</span>
                    </h4>
                    <small class="text-muted">Semua status reservasi</small>
                </div>
            </div>
        </div>

        {{-- Status Reservasi --}}
        <div class="col-md-4">
            <div class="card h-100" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;background:#f5f6fa">
                <div class="card-body p-4">
                    <div class="mb-3" style="width:36px;height:36px;background:#EAF3DE;border-radius:8px;display:flex;align-items:center;justify-content:center">
                        <i class="feather icon-bar-chart-2" style="font-size:16px;color:#3B6D11"></i>
                    </div>
                    <p class="mb-2 text-muted" style="font-size:12px;font-weight:500">Status Reservasi</p>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span style="background:#EAF3DE;color:#27500A;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:500">Selesai</span>
                        <span style="font-size:16px;font-weight:500;color:#1a1a1a">{{ number_format($reservasiSelesai, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Tabel Diskon Aktif --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Nama Diskon</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Besar Diskon</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Berlaku Mulai</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Berlaku Sampai</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($diskonAktif as $index => $diskon)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        <td class="text-center text-muted" style="padding:12px 14px;font-size:12px;vertical-align:middle">
                            {{ $index + 1 }}
                        </td>

                        <td style="padding:12px 14px;vertical-align:middle;font-weight:500;color:#1a1a1a">
                            {{ $diskon->nama_diskon }}
                        </td>

                        <td style="padding:12px 14px;vertical-align:middle">
                            <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                {{ $diskon->persentase_diskon }}%
                            </span>
                        </td>

                        <td class="text-muted" style="padding:12px 14px;vertical-align:middle;white-space:nowrap">
                            {{ $diskon->tanggal_mulai ? \Carbon\Carbon::parse($diskon->tanggal_mulai)->format('d F Y') : '-' }}
                        </td>

                        <td class="text-muted" style="padding:12px 14px;vertical-align:middle;white-space:nowrap">
                            {{ $diskon->tanggal_berakhir ? \Carbon\Carbon::parse($diskon->tanggal_berakhir)->format('d F Y') : '-' }}
                        </td>

                        <td style="padding:12px 14px;vertical-align:middle">
                            <span style="background:#EAF3DE;color:#27500A;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                Aktif
                            </span>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4" style="font-size:13px">
                            Tidak ada diskon aktif saat ini
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection