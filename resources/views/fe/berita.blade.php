<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">

        {{-- Header --}}
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <p class="news-eyebrow">What's New</p>
                <h3 class="news-main-title"><span class="orange-text">Banda Islands</span> News</h3>
                <p class="news-main-sub">What's New in Banda Neira</p>
            </div>
        </div>

        {{-- Cards --}}
        <div class="row mt-5">
            @foreach($beritas as $berita)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="news-card-wrap">

                    {{-- Thumbnail --}}
                    <a href="news" class="news-thumb-link">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}" class="news-thumb" alt="Foto Berita">
                        @else
                            <div class="news-thumb-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                        @endif
                    </a>

                    {{-- Body --}}
                    <div class="news-card-body">
                        <span class="news-category-badge">
                            {{ $berita->kategori->kategori_berita ?? '-' }}
                        </span>

                        <h3 class="news-card-title">
                            <a href="news">{{ $berita->judul }}</a>
                        </h3>

                        <div class="news-card-meta">
                            <span><i class="fas fa-user"></i> Admin</span>
                            <span><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y') }}</span>
                        </div>

                        <hr class="news-divider">

                        <p class="news-card-excerpt">
                            {{ Str::limit(strip_tags($berita->berita), 200) }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        {{-- More Button --}}
        <div class="row">
			<div class="col-lg-12 text-center">
				<a href="news" class="boxed-btn">More News</a>
			</div>
		</div>

    </div>
</div>
<!-- end latest news -->