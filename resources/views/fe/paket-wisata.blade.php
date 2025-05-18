<!-- product section -->
<div class="product-section section properties mt-150 mb-96">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3><span class="orange-text">Banda Islands </span> Adventures</h3>
					<p>Itinerary Overview</p>
				</div>
			</div>
		</div>
		<div class="row properties-box">
			@foreach($pakets as $paket)
			<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
				<div class="item">
					@if($paket->foto5)
						<img src="{{ asset('storage/' . $paket->foto5) }}" class="card-img-top" alt="Foto Paket">
					@endif
					<span class="category">Luxury Villa</span>
					<h6> Rp{{ number_format($paket->harga_per_pack, 0, ',', '.') }}</h6>
					<h4><a href="property-details.html">{{ $paket->nama_paket }}</a></h4>
					<p class="card-text">{{ Str::limit($paket->deskripsi, 100) }}</p>
					<p class="font-weight-bold">Fasilitas:</p>
                        @foreach(explode(',', $paket->fasilitas) as $fasilitas)
                            <p>{{ trim($fasilitas) }}</p>
                        @endforeach
					<div class="main-button">
						<a href="{{ route('reservasi.create', $paket->id) }}">Reservation Now</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row">
					<div class="col-lg-12 text-center">
						<a href="news" class="boxed-btn">More Pack</a>
					</div>
				</div>
	</div>
</div>
	<!-- end product section -->