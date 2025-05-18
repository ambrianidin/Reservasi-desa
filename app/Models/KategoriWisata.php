<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    protected $table = 'kategori_wisatas';
    protected $fillable = [
        'kategori_wisata',
    ];
    public function obyekWisata()
    {
        return $this->hasMany(ObyekWisata::class, 'id_kategori_wisata');
    }
}
