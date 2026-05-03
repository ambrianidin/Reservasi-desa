<div class="section properties mb-4">
    <div class="container">
        <div class="row g-4">
            @foreach($beritas as $berita)
            <div class="col-lg-4 col-md-6">
                <div style="border-radius:12px;overflow:hidden;border:0.5px solid rgba(0,0,0,0.08);height:100%;display:flex;flex-direction:column">

                    {{-- Gambar --}}
                    <a href="{{ route('news.show', $berita->id) }}" style="display:block;overflow:hidden">
                        @if($berita->foto)
                            <img src="{{ asset('storage/' . $berita->foto) }}"
                                 alt="{{ $berita->judul }}"
                                 style="width:100%;height:200px;object-fit:cover;transition:transform 0.3s"
                                 onmouseover="this.style.transform='scale(1.04)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        @else
                            <div style="width:100%;height:200px;background:#f5f6fa;display:flex;align-items:center;justify-content:center">
                                <i class="fas fa-image" style="font-size:28px;color:#ccc"></i>
                            </div>
                        @endif
                    </a>

                    {{-- Body --}}
                    <div style="padding:18px 20px;flex:1;display:flex;flex-direction:column;gap:8px">

                        {{-- Kategori --}}
                        <span style="background:#E6F1FB;color:#0C447C;padding:3px 10px;border-radius:99px;font-size:11px;font-weight:500;align-self:flex-start">
                            {{ $berita->kategori->kategori_berita ?? '-' }}
                        </span>

                        {{-- Judul --}}
                        <a href="{{ route('news.show', $berita->id) }}" style="text-decoration:none">
                            <h6 style="font-weight:600;color:#1a1a1a;font-size:15px;line-height:1.4;margin:0">
                                {{ Str::limit($berita->judul, 60) }}
                            </h6>
                        </a>

                        {{-- Meta --}}
                        <div class="d-flex align-items-center gap-3" style="font-size:11px;color:#aaa">
                            <span><i class="fas fa-user me-1"></i> Admin</span>
                            <span><i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($berita->tgl_post)->format('d M Y') }}</span>
                        </div>

                        {{-- Excerpt --}}
                        <p style="font-size:13px;color:#666;line-height:1.6;margin:0;flex:1">
                            {{ Str::limit(strip_tags($berita->berita), 120) }}
                        </p>

                        {{-- Read More --}}
                        <a href="{{ route('news.show', $berita->id) }}"
                           style="display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:500;color:#185FA5;text-decoration:none;margin-top:4px">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right" style="font-size:11px"></i>
                        </a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>