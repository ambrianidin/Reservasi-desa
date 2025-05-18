<!-- product section -->
<div class="product-section section properties mb-96">
	<div class="container">
		<div class="row properties-box">
			@foreach($pakets as $paket)
			<div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
				<div class="item">
					@if($paket->foto5)
						<img src="{{ asset('storage/' . $paket->foto5) }}" class="card-img-top" alt="Foto Paket">
					@endif
					<h4><a href="">{{ $paket->nama_wisata }}</a></h4>
					<p class="card-text">{{ Str::limit($paket->deskripsi_wisata, 100) }}</p>
					<p class="font-weight-bold">Fasilitas:</p>
                        @foreach(explode(',', $paket->fasilitas) as $fasilitas)
                            <p>{{ trim($fasilitas) }}</p>
                        @endforeach
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
	<!-- end product section -->