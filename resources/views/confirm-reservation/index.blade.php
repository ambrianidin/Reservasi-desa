@extends('be.master')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 fw-bold">📋 Data Reservasi Pelanggan</h3>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="thead-dark text-white">
                <tr>
                    <th>Pelanggan</th>
                    <th>Paket Wisata</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th style="width: 250px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservasis as $res)
                <tr>
                    <td>
                        <strong>{{ $res->nama }}</strong><br>
                        <small class="text-muted">{{ $res->email }}</small>
                    </td>
                    <td>{{ $res->paket->nama_paket ?? '-' }}</td>
                    <td>{{ $res->tgl_reservasi_wisata }}</td>
                    <td class="fw-semibold text-end">Rp {{ number_format($res->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge text-white
                            @if($res->status_reservasi_wisata == 'pesan') bg-secondary
                            @elseif($res->status_reservasi_wisata == 'dibayar') bg-warning
                            @elseif($res->status_reservasi_wisata == 'selesai') bg-success
                            @elseif ($res->status_reservasi_wisata == 'batal') bg-danger @endif">
                            {{ ucfirst($res->status_reservasi_wisata) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('updateStatus') }}" method="POST" class="d-flex align-items-center gap-2 justify-content-center auto-submit-form">
                            @csrf
                            <input type="hidden" name="reservasi_id" value="{{ $res->id }}">
                            <select name="status" class="form-select form-select-sm status-dropdown" data-id="{{ $res->id }}">
                                <option value="" data-persentase="0" data-nilai="0">confirm</option>
                                <option value="selesai" {{ $res->status_reservasi_wisata == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="batal" {{ $res->status_reservasi_wisata == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @if($res->status_reservasi_wisata == 'pesan')
                                <button type="submit" name="confirm_bayar" value="1" class="btn btn-success btn-sm" title="Konfirmasi Dibayar">
                                    <i class="feather icon-check-circle"></i>
                                </button>
                            @endif
                            @if($res->file_bukti_tf)
                                <a href="{{ asset('storage/bukti_transfer/' . $res->file_bukti_tf) }}" target="_blank" class="btn btn-info btn-sm" title="Lihat Bukti">
                                    <i class="feather icon-eye"></i>
                                </a>
                            @else
                                <span class="badge bg-secondary">Belum Upload</span>
                            @endif
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-muted">Belum ada reservasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    document.querySelectorAll('.status-dropdown').forEach(select => {
        select.addEventListener('change', function () {
            const val = this.value;
            if (val === 'batal' || val === 'selesai') {
                this.closest('form').submit();
            }
        });
    });
</script>


@endsection
