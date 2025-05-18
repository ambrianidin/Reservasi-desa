<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisatas';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'harga_per_pack',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'created_at',
        'updated_at'
    ];

    public function diskon()
    {
        return $this->hasMany(Diskon::class, 'id_paket_wisata', 'id');
    }
}
