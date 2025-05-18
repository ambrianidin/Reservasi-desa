	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Banda Islands</span> News</h3>
						<p>What's New in Banda Neira</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach($beritas as $berita)
					<div class="col-lg-4 col-md-6 news-card">
						<div>
							<a href="news">
								<div class="news-card-img">
									@if($berita->foto)
										<img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top" alt="Foto Berita">
									@endif
								</div>
							</a>
							<div class="news-card-body">
								<p class="news-card-category"><strong>Kategori:</strong> {{ $berita->kategori->kategori_berita ?? '-' }}</p>
								<h3 class="news-card-title"><a href="news">{{$berita->judul}}</a></h3>
								<p class="news-card-meta">
									<span class="author"><i class="fas fa-user"></i> Admin</span>
									<span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y') }}</span>
								</p>
								<p class="news-card-text">{{ Str::limit(strip_tags($berita->berita), 200) }}</p>
							</div>
						</div>
					</div>
				@endforeach
				<div class="row">
					<div class="col-lg-12 text-center">
						<a href="news" class="boxed-btn">More News</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->