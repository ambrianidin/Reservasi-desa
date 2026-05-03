@extends('fe.master')
@section('reservasi')

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            {{-- Alert belum login --}}
            @guest
            <div class="d-flex align-items-center gap-2 mb-4 px-3 py-2"
                 style="background:#FFF8E1;border-radius:8px;border:0.5px solid #ffe082">
                <i class="fas fa-exclamation-circle" style="font-size:13px;color:#7A5700"></i>
                <small style="color:#7A5700;font-weight:500">
                    Silakan <a href="{{ route('login-pelanggan') }}" style="color:#7A5700;font-weight:600">login</a> terlebih dahulu untuk melakukan reservasi.
                </small>
            </div>
            @endguest
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                style="font-size:13px;border-radius:8px">
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert"
    style="font-size:13px;border-radius:8px">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

            <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_paket" value="{{ $paket->id }}">
                <input type="hidden" name="harga_paket" id="harga_paket" value="{{ $paket->harga_per_pack }}">
                <input type="hidden" name="harga" value="{{ $paket->harga_per_pack }}">
                <input type="hidden" name="total_bayar" id="total_bayar">

                <div class="row g-3">

                    {{-- Nama Paket --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Nama Paket</label>
                        <input type="text" class="form-control" value="{{ $paket->nama_paket }}" readonly
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa">
                    </div>

                    {{-- Harga --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Harga per Pack</label>
                        <input type="text" class="form-control" value="Rp {{ number_format($paket->harga_per_pack, 0, ',', '.') }}" readonly
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa">
                    </div>

                    {{-- Info Pemesan --}}
                    @auth
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->pelanggan->nama_lengkap }}" readonly
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Email</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa">
                    </div>
                    @endauth

                    <div class="col-12"><hr style="border-color:rgba(0,0,0,0.06);margin:2px 0"></div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px">
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" required
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px">
                    </div>

                    {{-- Jumlah Peserta --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Jumlah Peserta</label>
                        <input type="number" name="jumlah_peserta" id="jumlah_peserta" class="form-control"
                               value="1" min="1" required
                               style="width:100%;font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px">
                    </div>

                    {{-- Diskon --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Pilih Diskon</label>
                        <select name="id_diskon" id="diskon_select" class="form-select"
                                style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px">
                            <option value="" data-persentase="0" data-nilai="0">-- Tanpa Diskon --</option>
                            @foreach($diskons as $diskon)
                            <option value="{{ $diskon->id }}"
                                    data-persentase="{{ $diskon->persentase_diskon ?? 0 }}"
                                    data-nilai="{{ $diskon->nilai_diskon ?? 0 }}">
                                {{ $diskon->nama_diskon }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12"><hr style="border-color:rgba(0,0,0,0.06);margin:2px 0"></div>

                    {{-- Jenis Pembayaran --}}
                    <div class="col-12">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Jenis Pembayaran</label>
                        <div class="row g-2">
                            @foreach($jenisPembayarans as $jp)
                            <div class="col-md-4">
                                <label id="label-jp-{{ $jp->id }}"
                                       style="display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border:0.5px solid rgba(0,0,0,0.1);border-radius:8px;cursor:pointer;width:100%">
                                    <input type="radio" name="id_jenis_pembayaran" value="{{ $jp->id }}"
                                           required onchange="highlightJP({{ $jp->id }})"
                                           style="margin-top:3px;accent-color:#185FA5">
                                    <div>
                                        <div style="font-size:13px;font-weight:500;color:#1a1a1a">{{ $jp->nama_rekening }}</div>
                                        <div style="font-size:11px;color:#888">{{ $jp->nomor_rekening }}</div>
                                        <div style="font-size:11px;color:#aaa">a.n {{ $jp->atas_nama }}</div>
                                    </div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Upload Bukti --}}
                    <div class="col-12">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Upload Bukti Transfer</label>
                        <input type="file" name="file_bukti_tf" class="form-control" accept=".jpg,.jpeg,.png,.pdf"
                               style="font-size:13px;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px">
                        <small class="text-muted" style="font-size:11px">Format: JPG, PNG, PDF. Maks 2MB.</small>
                    </div>

                    <div class="col-12"><hr style="border-color:rgba(0,0,0,0.06);margin:2px 0"></div>

                    {{-- Subtotal --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Subtotal</label>
                        <input type="text" id="subtotal_display" class="form-control" readonly
                               style="font-size:13px;font-weight:500;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa;color:#185FA5">
                    </div>

                    {{-- Total Bayar --}}
                    <div class="col-md-6">
                        <label class="form-label" style="font-size:12px;font-weight:500;color:#555">Total Bayar</label>
                        <input type="text" id="total_display" class="form-control" readonly
                               style="font-size:13px;font-weight:600;border:0.5px solid rgba(0,0,0,0.12);border-radius:8px;background:#f5f6fa;color:#27500A">
                    </div>

                    {{-- Submit --}}
                    <div class="col-12 mt-2">
                        @auth
                        <button type="submit" class="btn w-100 py-2"
                                style="background:#185FA5;color:#fff;border-radius:8px;font-size:13px;font-weight:500;border:none">
                            <i class="fas fa-paper-plane me-2"></i> Submit Reservasi
                        </button>
                        @else
                        <a href="{{ route('login-pelanggan') }}" class="btn w-100 py-2"
                           style="background:#f5f6fa;color:#555;border-radius:8px;font-size:13px;font-weight:500;border:0.5px solid rgba(0,0,0,0.1)">
                            Login untuk Reservasi
                        </a>
                        @endauth
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
function formatRupiah(angka) {
    return 'Rp ' + angka.toLocaleString('id-ID');
}

function hitungTotal() {
    let hargaPaket    = parseInt(document.getElementById('harga_paket').value);
    let jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value || 1);
    let subtotal      = hargaPaket * jumlahPeserta;

    let diskon   = document.getElementById('diskon_select');
    let selected = diskon.options[diskon.selectedIndex];
    let persen   = parseFloat(selected.getAttribute('data-persentase'));
    let nilai    = parseFloat(selected.getAttribute('data-nilai'));

    let potongan = 0;
    if (persen > 0) {
        potongan = subtotal * (persen / 100);
    } else if (nilai > 0) {
        potongan = nilai;
    }

    let total = Math.max(subtotal - potongan, 0);

    document.getElementById('subtotal_display').value = formatRupiah(subtotal);
    document.getElementById('total_display').value    = formatRupiah(total);
    document.getElementById('total_bayar').value      = total;
}

function highlightJP(id) {
    document.querySelectorAll('[id^="label-jp-"]').forEach(el => {
        el.style.borderColor = 'rgba(0,0,0,0.1)';
        el.style.background  = '#fff';
    });
    let active = document.getElementById('label-jp-' + id);
    if (active) {
        active.style.borderColor = '#185FA5';
        active.style.background  = '#EBF3FB';
    }
}

document.getElementById('jumlah_peserta').addEventListener('input', hitungTotal);
document.getElementById('diskon_select').addEventListener('change', hitungTotal);
window.onload = hitungTotal;
</script>

@endsection