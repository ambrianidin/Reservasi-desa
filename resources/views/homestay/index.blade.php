@extends('be.master')
@section('content')
<div class="container container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="font-weight-semibold mb-0">Data Homestay</h4>
        <a href="{{ route('homestay.create') }}" class="btn btn-success btn-rounded">
            <i class="feather icon-plus-circle"></i> Tambah Homestay
        </a>
    </div>
    <div class="row g-4">
        @foreach($penginapans as $homestays)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body p-3">
                    <!-- Automatic Slider -->
                    <div class="slider mb-3">
                        <div class="slider-inner">
                            @for ($i = 1; $i <= 5; $i++)
                                @php $foto = 'foto' . $i; @endphp
                                @if ($homestays->$foto)
                                    <img src="{{ asset('storage/' . $homestays->$foto) }}" class="rounded" style="height: 200px; width: 100%; object-fit: cover;" alt="Foto {{ $i }}">
                                @endif
                            @endfor
                        </div>
                    </div>
                    <p class="mb-2 text-blue font-weight-bold">{{ $homestays->nama_penginapan }}</p>
                    <p class="text-muted small mb-2">{{ Str::limit($homestays->deskripsi, 100) }}</p>
                    <a class="text-muted small">Fasilitas:</a>
                    <div class="text-muted small" style="white-space: normal; word-wrap: break-word;">
                        {{ $homestays->fasilitas }}
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <a href="{{ route('homestay.edit', $homestays->id) }}" class="btn btn-warning btn-sm">
                            <i class="feather icon-edit"></i> Edit
                        </a>
                        <form action="{{ route('homestay.destroy', $homestays->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="feather icon-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.slider');
    sliders.forEach(slider => {
        const sliderInner = slider.querySelector('.slider-inner');
        const images = sliderInner.querySelectorAll('img');
        let index = 0;

        setInterval(() => {
            index = (index + 1) % images.length;
            sliderInner.style.transform = `translateX(-${index * 100}%)`;
        }, 3000); // Change image every 3 seconds
    });
});
</script>
@endsection
