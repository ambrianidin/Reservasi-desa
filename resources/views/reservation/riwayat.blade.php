@extends('fe.master')
@section('history')
<div class="container my-5">
    <h2 class="mb-4 fw-bold">Riwayat Reservasi</h2>
    <a href="{{ route('index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
    </a>
    @if($reservasis->isEmpty())
        <div class="alert alert-warning" role="alert">
            Anda belum memiliki reservasi.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Paket</th>
                        <th>Tanggal Reservasi</th>
                        <th>Jumlah Orang</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasis as $reservasi)
                        @php
                            $status = $reservasi->status_reservasi_wisata;
                            $labelClass = match($status) {
                                'pesan' => 'warning',
                                'dibayar', 'selesai' => 'success',
                                'batal' => 'danger',
                                default => 'secondary',
                            };
                            $labelText = match($status) {
                                'pesan' => 'Pesan',
                                'dibayar' => 'Disetujui',
                                'selesai' => 'Selesai',
                                'batal' => 'Dibatalkan',
                                default => ucfirst($status),
                            };
                        @endphp
                        <tr>
                            <td>{{ $reservasi->paket->nama_paket }}</td>
                            <td>{{ $reservasi->tgl_reservasi_wisata }}</td>
                            <td>{{ $reservasi->jumlah_peserta }}</td>
                            <td><span class="badge bg-primary">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</span></td>
                            <td><span class="badge bg-{{ $labelClass }}">{{ $labelText }}</span></td>
                            <td>
                                <a href="{{ route('reservasi.nota', $reservasi->id) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Download Nota
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
