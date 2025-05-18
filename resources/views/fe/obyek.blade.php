<!-- product section -->
<div class="product-section section properties mt-150 mb-96">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3>Object Tour<span class="orange-text"> Banda Neira </span> </h3>
					<p>Explore the Best of Banda Neira</p>
				</div>
			</div>
		</div>
		<div class="row properties-box">
			@foreach($obyekwisatas as $obyek)
			<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
				<div class="item">
					@if($obyek->foto3)
						<img src="{{ asset('storage/' . $obyek->foto3) }}" class="card-img-top" alt="Foto Obyek">
					@endif
					<span class="category"> {{ $obyek->kategoriWisata->kategori_wisata ?? '-' }}</span>
					<h4><a href="property-details.html">{{ $obyek->nama_wisata }}</a></h4>
					<p class="card-text">{{ Str::limit($obyek->deskripsi_wisata, 100) }}</p>
					<p class="font-weight-bold">Fasilitas:</p>
                        @foreach(explode(',', $obyek->fasilitas) as $fasilitas)
                            <p>{{ trim($fasilitas) }}</p>
                        @endforeach
				</div>
			</div>
			@endforeach
		</div>
        <div class="row">
					<div class="col-lg-12 text-center">
						<a href="news" class="boxed-btn">More Object</a>
					</div>
				</div>
	</div>
</div>
	<!-- end product section -->