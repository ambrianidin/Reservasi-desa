@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Dashboard Owner</h5>
        <a href="{{ route('pemilik.export.pdf', ['tahun' => request('tahun'),'bulan' => request('bulan')]) }}"
           class="btn btn-sm d-inline-flex align-items-center gap-2"
           style="background:#185FA5;color:#fff;border-radius:8px;font-size:13px;font-weight:500;padding:8px 16px;border:none">
            <i class="feather icon-download" style="font-size:14px"></i>
            Download Laporan
        </a>
    </div>

    {{-- Filter --}}
    <form method="GET" action="{{ route('pemilik') }}" id="filterForm" class="mb-4">
        <div class="d-flex align-items-center gap-10" x-data>

            {{-- Dropdown Tahun --}}
            <div x-data="{ open: false }" x-on:click.outside="open = false" style="position:relative;margin-right:10px">
                <button type="button"
                        x-on:click="open = !open"
                        style="display:inline-flex;align-items:center;gap:10px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;font-size:13px;padding:7px 12px;color:#1a1a1a;background:#fff;cursor:pointer;outline:none">
                    <i class="feather icon-calendar" style="font-size:12px;color:#888"></i>
                    <span>{{ request('tahun', date('Y')) }}</span>
                    <i class="feather icon-chevron-down" style="font-size:11px;color:#aaa" x-bind:style="open ? 'transform:rotate(180deg)' : ''"></i>
                </button>
                <input type="hidden" name="tahun" value="{{ request('tahun', date('Y')) }}" id="inputTahun">
                <div x-show="open"
                     x-transition
                     style="position:absolute;top:calc(100% + 4px);left:0;background:#fff;border:0.5px solid rgba(0,0,0,0.1);border-radius:10px;box-shadow:0 4px 16px rgba(0,0,0,0.08);z-index:100;min-width:120px;padding:4px 0">
                    @foreach($tahunList as $t)
                    <div x-on:click="
                            document.getElementById('inputTahun').value = '{{ $t }}';
                            document.getElementById('filterForm').submit();
                            open = false"
                         style="padding:8px 14px;font-size:13px;cursor:pointer;color:{{ request('tahun', date('Y')) == $t ? '#185FA5' : '#1a1a1a' }};font-weight:{{ request('tahun', date('Y')) == $t ? '500' : '400' }}"
                         onmouseover="this.style.background='#f5f6fa'"
                         onmouseout="this.style.background='transparent'">
                        {{ $t }}
                        @if(request('tahun', date('Y')) == $t)
                            <i class="feather icon-check" style="font-size:11px;color:#185FA5;float:right;margin-top:2px"></i>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Dropdown Bulan --}}
            @php
                $bulanList = [1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
                              7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'];
                $selectedBulan = request('bulan');
            @endphp
            <div x-data="{ open: false }" x-on:click.outside="open = false" style="position:relative">
                <button type="button"
                        x-on:click="open = !open"
                        style="display:inline-flex;align-items:center;gap:6px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;font-size:13px;padding:7px 12px;color:#1a1a1a;background:#fff;cursor:pointer;outline:none">
                    <i class="feather icon-filter" style="font-size:12px;color:#888"></i>
                    <span>{{ $selectedBulan ? $bulanList[$selectedBulan] : 'Semua Bulan' }}</span>
                    <i class="feather icon-chevron-down" style="font-size:11px;color:#aaa" x-bind:style="open ? 'transform:rotate(180deg)' : ''"></i>
                </button>
                <input type="hidden" name="bulan" value="{{ $selectedBulan ?? '' }}" id="inputBulan">
                <div x-show="open"
                     x-transition
                     style="position:absolute;top:calc(100% + 4px);left:0;background:#fff;border:0.5px solid rgba(0,0,0,0.1);border-radius:10px;box-shadow:0 4px 16px rgba(0,0,0,0.08);z-index:100;min-width:150px;padding:4px 0">
                    {{-- Semua Bulan --}}
                    <div x-on:click="
                            document.getElementById('inputBulan').value = '';
                            document.getElementById('filterForm').submit();
                            open = false"
                         style="padding:8px 14px;font-size:13px;cursor:pointer;color:{{ !$selectedBulan ? '#185FA5' : '#1a1a1a' }};font-weight:{{ !$selectedBulan ? '500' : '400' }}"
                         onmouseover="this.style.background='#f5f6fa'"
                         onmouseout="this.style.background='transparent'">
                        Semua Bulan
                        @if(!$selectedBulan)
                            <i class="feather icon-check" style="font-size:11px;color:#185FA5;float:right;margin-top:2px"></i>
                        @endif
                    </div>
                    <div style="height:0.5px;background:rgba(0,0,0,0.06);margin:3px 0"></div>
                    @foreach($bulanList as $num => $nama)
                    <div x-on:click="
                            document.getElementById('inputBulan').value = '{{ $num }}';
                            document.getElementById('filterForm').submit();
                            open = false"
                         style="padding:8px 14px;font-size:13px;cursor:pointer;color:{{ $selectedBulan == $num ? '#185FA5' : '#1a1a1a' }};font-weight:{{ $selectedBulan == $num ? '500' : '400' }}"
                         onmouseover="this.style.background='#f5f6fa'"
                         onmouseout="this.style.background='transparent'">
                        {{ $nama }}
                        @if($selectedBulan == $num)
                            <i class="feather icon-check" style="font-size:11px;color:#185FA5;float:right;margin-top:2px"></i>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">

        {{-- Total Pendapatan --}}
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
                    <small style="color:rgba(255,255,255,0.45)">Dari reservasi yang selesai</small>
                </div>
            </div>
        </div>

        {{-- Total Reservasi --}}
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

        {{-- Reservasi Selesai --}}
        <div class="col-md-4">
            <div class="card h-100" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;background:#f5f6fa">
                <div class="card-body p-4">
                    <div class="mb-3" style="width:36px;height:36px;background:#EAF3DE;border-radius:8px;display:flex;align-items:center;justify-content:center">
                        <i class="feather icon-check-circle" style="font-size:16px;color:#3B6D11"></i>
                    </div>
                    <p class="mb-1 text-muted" style="font-size:12px;font-weight:500">Reservasi Selesai</p>
                    <h4 class="mb-1" style="font-weight:500;color:#1a1a1a;letter-spacing:-0.3px">
                        {{ number_format($reservasiSelesai, 0, ',', '.') }}
                        <span class="text-muted" style="font-size:14px;font-weight:400">transaksi</span>
                    </h4>
                    <small class="text-muted">Status selesai</small>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection