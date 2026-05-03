{{-- Product Section --}}
<div class="section properties mb-5">
    <div class="container">

        {{-- Paket Wisata --}}
        <div class="row g-4">
            @foreach($pakets as $paket)
            <div class="col-lg-4 col-md-6">
                <div style="border-radius:12px;overflow:hidden;border:0.5px solid rgba(0,0,0,0.08);height:100%;display:flex;flex-direction:column">

                    {{-- Gambar --}}
                    <div style="overflow:hidden">
                        @if($paket->foto1)
                            <img src="{{ asset('storage/' . $paket->foto1) }}"
                                 alt="{{ $paket->nama_wisata }}"
                                 style="width:100%;height:200px;object-fit:cover;transition:transform 0.3s"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        @else
                            <div style="width:100%;height:200px;background:#f5f6fa;display:flex;align-items:center;justify-content:center">
                                <i class="fas fa-image" style="font-size:28px;color:#ccc"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div style="padding:18px 20px;flex:1;display:flex;flex-direction:column;gap:10px">

                        {{-- Nama --}}
                        <h6 style="font-weight:600;color:#1a1a1a;font-size:15px;margin:0">
                            {{ $paket->nama_wisata }}
                        </h6>

                        {{-- Deskripsi --}}
                        <p style="font-size:13px;color:#666;line-height:1.6;margin:0">
                            {{ Str::limit($paket->deskripsi_wisata, 100) }}
                        </p>

                        {{-- Fasilitas --}}
                        <div>
                            <p style="font-size:11px;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px">Fasilitas</p>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach(explode(',', $paket->fasilitas) as $f)
                                <span style="background:#f5f6fa;color:#555;padding:3px 10px;border-radius:99px;font-size:11px;border:0.5px solid rgba(0,0,0,0.08)">
                                    {{ trim($f) }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Divider Penginapan --}}
        <div class="text-center my-5">
            <h5 style="font-weight:600;color:#1a1a1a">Penginapan</h5>
            <div style="width:40px;height:3px;background:#185FA5;border-radius:99px;margin:8px auto 0"></div>
        </div>

        {{-- Penginapan --}}
        <div class="row g-4">
            @foreach($penginapans as $penginapan)
            <div class="col-lg-4 col-md-6">
                <div style="border-radius:12px;overflow:hidden;border:0.5px solid rgba(0,0,0,0.08);height:100%;display:flex;flex-direction:column">

                    {{-- Gambar --}}
                    <div style="overflow:hidden">
                        @if($penginapan->foto1)
                            <img src="{{ asset('storage/' . $penginapan->foto1) }}"
                                 alt="{{ $penginapan->nama_penginapan }}"
                                 style="width:100%;height:200px;object-fit:cover;transition:transform 0.3s"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        @else
                            <div style="width:100%;height:200px;background:#f5f6fa;display:flex;align-items:center;justify-content:center">
                                <i class="fas fa-image" style="font-size:28px;color:#ccc"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Body --}}
                    <div style="padding:18px 20px;flex:1;display:flex;flex-direction:column;gap:10px">

                        {{-- Nama --}}
                        <h6 style="font-weight:600;color:#1a1a1a;font-size:15px;margin:0">
                            {{ $penginapan->nama_penginapan }}
                        </h6>

                        {{-- Deskripsi --}}
                        <p style="font-size:13px;color:#666;line-height:1.6;margin:0">
                            {{ Str::limit($penginapan->deskripsi, 100) }}
                        </p>

                        {{-- Fasilitas --}}
                        <div>
                            <p style="font-size:11px;font-weight:600;color:#888;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:6px">Fasilitas</p>
                            <ul style="padding-left:18px;margin:0;font-size:13px;color:#555">
								@foreach(explode(',', $penginapan->fasilitas) as $f)
									<li style="margin-bottom:4px">
										{{ trim($f) }}
									</li>
								@endforeach
							</ul>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>