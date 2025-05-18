@extends('fe.master')
@section('reservasi')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-calendar-check me-2"></i> Reservasi Paket: <span class="text-danger">{{ $paket->nama_paket }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_paket" value="{{ $paket->id }}">
                        <input type="hidden" name="harga_paket" id="harga_paket" value="{{ $paket->harga_per_pack }}">

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">Nama Paket</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-box-open"></i></span>
                                    <input type="text" class="form-control py-2" value="{{ $paket->nama_paket }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label>Harga Paket</label>
                                <input type="text" class="form-control" value="Rp{{ number_format($paket->harga_per_pack, 0, ',', '.') }}" readonly>
                                <input type="hidden" name="harga" value="{{ $paket->harga_per_pack }}">
                            </div>

                        </div>


                        @auth
                            <div class="mb-4">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control py-2" value="{{ Auth::user()->pelanggan->nama_lengkap }}" readonly>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                    <input type="text" class="form-control py-2" value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <div>
                                    Silakan <a href="{{ route('login-pelanggan') }}" class="alert-link">login</a> terlebih dahulu untuk melakukan reservasi.
                                </div>
                            </div>
                        @endauth
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" required>
                            </div>

                        </div>
                        
                        <div class="mb-4">
                            <label for="jumlah_peserta" class="form-label fw-bold">Jumlah Peserta</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-users"></i></span>
                                <input type="number" class="form-control py-2" name="jumlah_peserta" id="jumlah_peserta" value="1" min="1" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="diskon_select" class="form-label fw-bold">Pilih Diskon</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                <select class="form-select py-2" name="id_diskon" id="diskon_select">
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
                        </div>
                        <div class="form-group mb-3">
                            <label for="file_bukti_tf">Upload Bukti Transfer</label>
                            <input type="file" name="file_bukti_tf" class="form-control" accept=".jpg,.jpeg,.png,.pdf" >
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="form-label fw-bold">Subtotal</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-receipt"></i></span>
                                    <input type="text" class="form-control py-2 fw-bold text-primary" id="subtotal_display" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Total Bayar</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-money-bill-wave"></i></span>
                                    <input type="text" class="form-control py-2 fw-bold text-success" id="total_display" readonly>
                                    <input type="hidden" name="total_bayar" id="total_bayar">
                                </div>
                            </div>
                        </div>
                        @auth
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg py-2 shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i> Submit Reservasi
                            </button>
                        </div>
                        @else
                            <a href="{{ route('login-pelanggan') }}" class="btn btn-outline-secondary">Login untuk Reservasi</a>
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function formatRupiah(angka) {
    return 'Rp' + angka.toLocaleString('id-ID');
}

function hitungTotal() {
    let hargaPaket = parseInt(document.getElementById('harga_paket').value);
    let jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value || 1);
    let subtotal = hargaPaket * jumlahPeserta;

    let diskon = document.getElementById('diskon_select');
    let selected = diskon.options[diskon.selectedIndex];
    let persen = parseFloat(selected.getAttribute('data-persentase'));
    let nilai = parseFloat(selected.getAttribute('data-nilai'));

    let potongan = 0;
    if (persen > 0) {
        potongan = subtotal * (persen / 100);
    } else if (nilai > 0) {
        potongan = nilai;
    }

    let total = Math.max(subtotal - potongan, 0);

    document.getElementById('subtotal_display').value = formatRupiah(subtotal);
    document.getElementById('total_display').value = formatRupiah(total);
    document.getElementById('total_bayar').value = total;
}

document.getElementById('jumlah_peserta').addEventListener('input', hitungTotal);
document.getElementById('diskon_select').addEventListener('change', hitungTotal);
window.onload = hitungTotal;
</script>
@endsection

