<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = [
        'judul', 
        'berita', 
        'tgl_post', 
        'foto', 
        'id_kategori_berita'
    ];
    protected $casts = [
        'tgl_post' => 'date', // Cast ke tipe date
    ];    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori_berita');
    }
}
