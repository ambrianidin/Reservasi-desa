@extends('be.master')
@section('content')

<div class="container-fluid py-4">

    {{-- Topbar --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-weight:500">Data Reservasi Pelanggan</h5>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="d-flex align-items-center gap-2 mb-4 px-3 py-2"
         style="background:#EAF3DE;border-radius:8px;border:0.5px solid #c3dfa8">
        <i class="feather icon-check-circle" style="font-size:14px;color:#27500A;padding-right:10px"></i>
        <small style="color:#27500A;font-weight:500"> {{ session('success') }}</small>
    </div>
    @endif

    {{-- Table Card --}}
    <div class="card" style="border:0.5px solid rgba(0,0,0,0.08);border-radius:12px;overflow:hidden">
        <div class="table-responsive">
            <table class="table mb-0" style="font-size:13px">
                <thead style="background:#f8f9fa">
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.08)">
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 5px;width:40px">No</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Pelanggan</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Paket Wisata</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Tanggal</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Total Bayar</th>
                        <th class="text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Status</th>
                        <th class="text-center text-muted" style="font-size:11px;font-weight:500;padding:12px 14px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($reservasis as $index => $res)
                    <tr style="border-bottom:0.5px solid rgba(0,0,0,0.06)">

                        {{-- No --}}
                        <td class="text-center text-muted" style="padding:12px 5px;font-size:12px;vertical-align:middle">
                            {{ $index + 1 }}
                        </td>

                        {{-- Pelanggan --}}
                        <td style="padding:12px 10px;vertical-align:middle">
                            <div style="font-weight:500;color:#1a1a1a">{{ $res->nama }}</div>
                            <div class="text-muted" style="font-size:11px">{{ $res->email }}</div>
                        </td>

                        {{-- Paket Wisata --}}
                        <td style="padding:12px 10px;vertical-align:middle">
                            <span style="background:#E6F1FB;color:#0C447C;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                {{ $res->paket->nama_paket ?? '-' }}
                            </span>
                        </td>

                        {{-- Tanggal --}}
                        <td class="text-muted" style="padding:12px 10px;vertical-align:middle;white-space:nowrap">
                            @php
                            $tanggal = explode(' s.d ', $res->tgl_reservasi_wisata);

                            $tglMulai = \Carbon\Carbon::parse($tanggal[0])->translatedFormat('d F Y');

                            $tglAkhir = isset($tanggal[1])
                                ? \Carbon\Carbon::parse($tanggal[1])->translatedFormat('d F Y')
                                : null;
                            @endphp

                            {{ $tglMulai }}
                            @if($tglAkhir)
                            - {{ $tglAkhir }}
                            @endif
                        </td>

                        {{-- Total Bayar --}}
                        <td style="padding:12px 10px;vertical-align:middle;font-weight:500;color:#1a1a1a">
                            Rp {{ number_format($res->total_bayar, 0, ',', '.') }}
                        </td>

                        {{-- Status --}}
                        <td style="padding:12px 14px;vertical-align:middle">
                            @php
                                $styleMap = [
                                    'confirm' => 'background:#F5F5F5;color:#555',
                                    'pesan'   => 'background:#E6F1FB;color:#0C447C',
                                    'dibayar' => 'background:#FFF8E1;color:#7A5700',
                                    'selesai' => 'background:#EAF3DE;color:#27500A',
                                    'batal'   => 'background:#FCEBEB;color:#A32D2D',
                                ];
                                $s = $res->status_reservasi_wisata;
                                $style = $styleMap[$s] ?? 'background:#F5F5F5;color:#777';
                            @endphp
                            <span style="{{ $style }};padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500">
                                {{ ucfirst($s) }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="text-center" style="padding:12px 14px;vertical-align:middle">
                            <form action="{{ route('updateStatus') }}" method="POST"
                                class="d-flex justify-content-center align-items-center gap-2 auto-submit-form"
                                id="form-{{ $res->id }}">
                                @csrf
                                <input type="hidden" name="reservasi_id" value="{{ $res->id }}">
                                <input type="hidden" name="status" id="status-{{ $res->id }}" value="{{ $s }}">

                                {{-- Dropdown Status Alpine --}}
                                <div x-data="{
                                    open: false,
                                    selected: '{{ $s }}',
                                    top: 0,
                                    left: 0,
                                    options: [
                                        { value: 'confirm', label: 'Confirm' },
                                        { value: 'pesan',   label: 'Pesan' },
                                        { value: 'dibayar', label: 'Dibayar' },
                                        { value: 'selesai', label: 'Selesai' },
                                        { value: 'batal',   label: 'Dibatalkan' },
                                    ],
                                    toggle(el) {
                                        const rect = el.getBoundingClientRect();
                                        this.top  = rect.bottom + window.scrollY + 4;
                                        this.left = rect.left + window.scrollX;
                                        this.open = !this.open;
                                    },
                                    select(val) {
                                        this.selected = val;
                                        document.getElementById('status-{{ $res->id }}').value = val;
                                        this.open = false;
                                        if (['dibayar','batal','selesai'].includes(val)) {
                                            document.getElementById('form-{{ $res->id }}').submit();
                                        }
                                    }
                                }"
                                x-on:click.outside="open = false"
                                style="position:relative">

                                <button type="button"
                                        x-on:click="toggle($el)"
                                        style="display:inline-flex;align-items:center;gap:5px;border:0.5px solid rgba(0,0,0,0.12);border-radius:6px;font-size:12px;padding:5px 10px;color:#1a1a1a;background:#fff;cursor:pointer;outline:none;white-space:nowrap">
                                    <span x-text="options.find(o => o.value === selected)?.label"></span>
                                    <i class="feather icon-chevron-down" style="font-size:11px;color:#aaa"
                                    x-bind:style="open ? 'transform:rotate(180deg);transition:0.2s' : 'transition:0.2s'"></i>
                                </button>

                                {{-- Dropdown pakai position:fixed agar keluar dari overflow tabel --}}
                                <div x-show="open"
                                    x-transition
                                    x-bind:style="`position:fixed;top:${top}px;left:${left}px;background:#fff;border:0.5px solid rgba(0,0,0,0.1);border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,0.08);z-index:9999;min-width:120px;padding:4px 0`">
                                    <template x-for="opt in options" :key="opt.value">
                                        <div x-on:click="select(opt.value)"
                                            x-bind:style="selected === opt.value ? 'color:#185FA5;font-weight:500' : 'color:#1a1a1a'"
                                            style="padding:7px 12px;font-size:12px;cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:8px"
                                            onmouseover="this.style.background='#f5f6fa'"
                                            onmouseout="this.style.background='transparent'">
                                            <span x-text="opt.label"></span>
                                            <i class="feather icon-check" style="font-size:11px;color:#185FA5"
                                            x-show="selected === opt.value"></i>
                                        </div>
                                    </template>
                                </div>

                            </div>

                                {{-- Tombol Konfirmasi --}}
                                @if($s == 'confirm')
                                <button type="submit" name="confirm_pesan" value="1"
                                        title="Konfirmasi"
                                        style="width:30px;height:30px;background:#EAF3DE;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;border:none;cursor:pointer">
                                    <i class="feather icon-check" style="font-size:13px;color:#27500A"></i>
                                </button>
                                @endif

                                {{-- Bukti Transfer --}}
                                @if($res->file_bukti_tf)
                                <a href="{{ asset('storage/public/bukti_transfer/' . $res->file_bukti_tf) }}"
                                target="_blank"
                                title="Lihat Bukti Transfer"
                                style="width:30px;height:30px;background:#E6F1FB;border-radius:6px;display:inline-flex;align-items:center;justify-content:center">
                                    <i class="feather icon-eye" style="font-size:13px;color:#0C447C"></i>
                                </a>
                                @else
                                <span style="font-size:11px;color:#aaa;white-space:nowrap">Belum upload</span>
                                @endif

                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4" style="font-size:13px">
                            Belum ada data reservasi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    document.querySelectorAll('.status-dropdown').forEach(select => {
        select.addEventListener('change', function () {
            const val = this.value;
            if (val === 'dibayar' || val === 'batal' || val === 'selesai') {
                this.closest('form').submit();
            }
        });
    });
</script>

@endsection