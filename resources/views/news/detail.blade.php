@extends('fe.master')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="mb-3 fw-bold">{{ $berita->judul }}</h2>
            <p class="text-muted">
                <strong>Kategori:</strong> {{ $berita->kategori->kategori_berita ?? '-' }} |
                <i class="fas fa-user"></i> Admin |
                <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y') }}
            </p>
            
            @if($berita->foto)
                <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid mb-4" alt="Foto Berita">
            @endif

            <div class="news-content">
                {!! $berita->berita !!}
            </div>
            <a href="{{route('news.index')}}" class="btn btn-info w-auto mt-3"><i class="fas fa-arrow-left"></i>  Back to News</a>
        </div>
    </div>
</div>
@endsection