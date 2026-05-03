@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="mb-0" style="font-weight:500">Dashboard Admin</h6>
        <small class="text-muted">Ringkasan data sistem</small>
    </div>

    {{-- 5 Stat Cards --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-md">
            <div class="p-3 h-100" style="background:#f5f6fa;border-radius:10px">
                <div class="mb-2" style="width:30px;height:30px;background:#E6F1FB;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <i class="feather icon-file-text" style="font-size:14px;color:#185FA5"></i>
                </div>
                <div class="text-muted" style="font-size:11px">Berita</div>
                <div style="font-size:22px;font-weight:500;line-height:1.1">{{ $totalBerita }}</div>
                <div class="text-muted" style="font-size:10px">total artikel</div>
            </div>
        </div>

        <div class="col-6 col-md">
            <div class="p-3 h-100" style="background:#f5f6fa;border-radius:10px">
                <div class="mb-2" style="width:30px;height:30px;background:#EAF3DE;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <i class="feather icon-users" style="font-size:14px;color:#3B6D11"></i>
                </div>
                <div class="text-muted" style="font-size:11px">Pengguna Karyawan</div>
                <div style="font-size:22px;font-weight:500;line-height:1.1">{{ number_format($totalUser, 0, ',', '.') }}</div>
                <div class="text-muted" style="font-size:10px">terdaftar</div>
            </div>
        </div>

        <div class="col-6 col-md">
            <div class="p-3 h-100" style="background:#f5f6fa;border-radius:10px">
                <div class="mb-2" style="width:30px;height:30px;background:#FAEEDA;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <i class="feather icon-home" style="font-size:14px;color:#854F0B"></i>
                </div>
                <div class="text-muted" style="font-size:11px">Homestay</div>
                <div style="font-size:22px;font-weight:500;line-height:1.1">{{ $totalHomestay }}</div>
                <div class="text-muted" style="font-size:10px">properti</div>
            </div>
        </div>

        <div class="col-6 col-md">
            <div class="p-3 h-100" style="background:#f5f6fa;border-radius:10px">
                <div class="mb-2" style="width:30px;height:30px;background:#E1F5EE;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <i class="feather icon-map-pin" style="font-size:14px;color:#0F6E56"></i>
                </div>
                <div class="text-muted" style="font-size:11px">Obyek Wisata</div>
                <div style="font-size:22px;font-weight:500;line-height:1.1">{{ $totalWisata }}</div>
                <div class="text-muted" style="font-size:10px">destinasi</div>
            </div>
        </div>

        <div class="col-6 col-md">
            <div class="p-3 h-100" style="background:#f5f6fa;border-radius:10px">
                <div class="mb-2" style="width:30px;height:30px;background:#EEEDFE;border-radius:6px;display:flex;align-items:center;justify-content:center">
                    <i class="feather icon-package" style="font-size:14px;color:#534AB7"></i>
                </div>
                <div class="text-muted" style="font-size:11px">Paket Wisata</div>
                <div style="font-size:22px;font-weight:500;line-height:1.1">{{ $totalPaket }}</div>
                <div class="text-muted" style="font-size:10px">paket tersedia</div>
            </div>
        </div>

    </div>

    {{-- Bottom Row --}}
    <div class="row g-3">

        {{-- Distribusi Data --}}
        <div class="col-md-6">
            <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px">
                <div class="card-body p-3">
                    <p class="text-uppercase text-muted mb-3" style="font-size:10px;font-weight:500;letter-spacing:.06em">Distribusi Data</p>
                    @php
                        $maxVal = max($totalUser, $totalBerita, $totalHomestay, $totalWisata, $totalPaket);
                        $bars = [
                            ['label' => 'Pengguna',     'val' => $totalUser,     'color' => '#378ADD'],
                            ['label' => 'Berita',       'val' => $totalBerita,   'color' => '#639922'],
                            ['label' => 'Homestay',     'val' => $totalHomestay, 'color' => '#EF9F27'],
                            ['label' => 'Obyek Wisata', 'val' => $totalWisata,   'color' => '#1D9E75'],
                            ['label' => 'Paket Wisata', 'val' => $totalPaket,    'color' => '#7F77DD'],
                        ];
                    @endphp
                    @foreach($bars as $bar)
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="text-muted text-end" style="font-size:11px;width:90px;flex-shrink:0">{{ $bar['label'] }}</span>
                        <div class="flex-grow-1" style="height:8px;background:#f0f0f0;border-radius:4px;overflow:hidden">
                            <div style="width:{{ $maxVal > 0 ? round($bar['val']/$maxVal*100) : 0 }}%;height:100%;background:{{ $bar['color'] }};border-radius:4px"></div>
                        </div>
                        <span style="font-size:11px;font-weight:500;min-width:30px;text-align:right">{{ number_format($bar['val'], 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px">
                <div class="card-body p-3">
                    <p class="text-uppercase text-muted mb-3" style="font-size:10px;font-weight:500;letter-spacing:.06em">Aktivitas Terbaru</p>
                    <table class="table table-sm mb-0" style="font-size:12px">
                        <thead>
                            <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                                <th class="text-muted fw-500 ps-0" style="font-size:10px">Nama</th>
                                <th class="text-muted fw-500" style="font-size:10px">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aktivitasTerbaru as $item)
                            <tr style="border-bottom:0.5px solid rgba(0,0,0,0.05)">
                                <td class="ps-0" style="font-weight:500;color:#1a1a1a">{{ $item['nama'] }}</td>
                                <td class="text-muted">{{ $item['kategori'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection