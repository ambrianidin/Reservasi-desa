<div class="text-center mb-4">
    <h2 class="voucher-title">VOUCHER DESA WISATA</h2>
</div>

<div class="row justify-content-center mb-5">
    @forelse($diskons as $diskon)
        <div class="col-md-5">
            <div class="voucher-card">
                <div class="voucher-left">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <div class="voucher-right">
                    <h5 class="card-title">{{ $diskon->nama_diskon }}</h5>
                    <p>Diskon: {{ $diskon->persentase_diskon }}%</p>
                    <p class="voucher-date">Berlaku Hingga: {{ \Carbon\Carbon::parse($diskon->tanggal_berakhir)->format('d M') }} S&K</p>
                </div>
                <span class="badge badge-quantity">x10</span>
            </div>
        </div>
    @empty
        <div class="col-md-6 text-center">
            <p>Tidak ada voucher yang tersedia saat ini.</p>
        </div>
    @endforelse
</div>