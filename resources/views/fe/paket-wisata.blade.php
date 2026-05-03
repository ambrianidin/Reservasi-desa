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
		<div class="row g-4">
      @foreach($pakets as $paket)
      <div class="col-lg-4 col-md-6">
        <div class="pkg-card h-100">

          {{-- Foto --}}
          @if($paket->foto1)
            <img src="{{ asset('storage/' . $paket->foto1) }}" class="pkg-thumb" alt="{{ $paket->nama_paket }}">
          @else
            <div class="pkg-thumb-placeholder">
              <i class="bi bi-image"></i>
            </div>
          @endif

          <div class="pkg-body">
            {{-- Badge & Harga --}}
            <div class="pkg-meta">
              <span class="pkg-badge">Paket Wisata</span>
              <span class="pkg-price">Rp{{ number_format($paket->harga_per_pack, 0, ',', '.') }}</span>
            </div>

            {{-- Nama Paket --}}
            <h5 class="pkg-name">{{ $paket->nama_paket }}</h5>

            {{-- Deskripsi --}}
            <p class="pkg-desc">{{ Str::limit($paket->deskripsi, 110) }}</p>

            <hr class="pkg-divider">

            {{-- Fasilitas --}}
            <div class="pkg-facilities">
              @foreach(explode(',', $paket->fasilitas) as $f)
                <span class="facility-tag">{{ trim($f) }}</span>
              @endforeach
            </div>
          </div>

          <div class="pkg-footer">
            <a href="{{ route('reservasi.create', $paket->id) }}" class="pkg-btn">
              Reservation Now →
            </a>
          </div>

        </div>
      </div>
      @endforeach
    </div>
    </div>