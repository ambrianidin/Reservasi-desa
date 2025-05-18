<div class="section properties mb-4">
    <div class="container">
	  <div class="row properties-box">
				@foreach($beritas as $berita)
					<div class="col-lg-4 col-md-4 news-card properties-items d-flex">
						<div>
							<a href="news">
								<div class="news-card-img">
									@if($berita->foto)
										<img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="Foto Berita">
									@endif
								</div>
							</a>
							<div class="news-card-body d-flex flex-column">
								<p class="news-card-category"><strong>Kategori:</strong> {{ $berita->kategori->kategori_berita ?? '-' }}</p>
								<h3 class="news-card-title"><a href="news">{{$berita->judul}}</a></h3>
								<p class="news-card-meta">
									<span class="author"><i class="fas fa-user"></i> Admin</span>
									<span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y') }}</span>
								</p>
								<p class="news-card-text">{{ Str::limit(strip_tags($berita->berita), 200) }}</p>
							</div>
							<a href="{{route('news.show', $berita->id)}}" class="btn btn-info btn-sm w-auto">Read More   <i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				@endforeach
			</div>
     	</div>
    </div>
</div>