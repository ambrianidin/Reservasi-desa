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
		<div class="container py-5">
    <div class="row">
        @foreach ($obyekwisatas as $index => $obyek)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-lg border-0 h-100 overflow-hidden rounded-4" data-bs-toggle="modal" data-bs-target="#modalFasilitas{{ $index }}" style="cursor: pointer;">
                <img class="card-img-top img-fluid object-fit-cover" src="{{ asset('storage/' . $obyek->foto1) }}" alt="{{ $obyek->nama_wisata }}" style="height: 220px; object-fit: cover;">
                <div class="card-body bg-white p-4">
                    <span class="badge text-white mb-2" style="font-size: 0.85rem;">{{ $obyek->KategoriWisata->kategori_wisata }}</span>
                    <h5 class="fw-bold orange-text">{{ $obyek->nama_wisata }}</h5>
                    <p class="text-muted small mb-0">{!! nl2br($obyek->deskripsi_wisata) !!}</p>
                </div>
            </div>
        </div>

<!-- Modal Custom -->
<div class="modal fade" id="modalFasilitas{{ $index }}" tabindex="-1" aria-labelledby="modalFasilitasLabel{{ $index }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 overflow-hidden bg-white text-dark">

            <!-- Modal Header -->
            <div class="modal-header bg-warning text-white d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="modal-title fw-bold" id="modalFasilitasLabel{{ $index }}">
                        <i class="bi bi-geo-alt-fill me-2"></i>{{ $obyek->nama_wisata }}
                    </h5>
                    <small class="text-white">Kategori: {{ $obyek->KategoriWisata->kategori_wisata }}</small>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="d-flex flex-column flex-md-row gap-4 p-4">
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $obyek->foto3) }}" alt="{{ $obyek->nama_wisata }}" class="img-fluid rounded-3" style="max-width: 300px;">
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold text-dark">Deskripsi</h6>
                    <p class="mb-3 text-dark">{!! nl2br($obyek->deskripsi_wisata) !!}</p>
                    <h6 class="fw-bold text-dark">Fasilitas</h6>
                    <ul class="list-unstyled text-dark">
                        @foreach (explode("\n", $obyek->fasilitas) as $fasilitas)
                            @if (trim($fasilitas) !== '')
                                <li class="mb-1"> ㆍ {{ trim($fasilitas) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        @endforeach
    </div>
</div>

        <div class="row">
					<div class="col-lg-12 text-center">
						<a href="wisata" class="boxed-btn">More Object</a>
					</div>
				</div>
	</div>
</div>
	<!-- end product section -->
