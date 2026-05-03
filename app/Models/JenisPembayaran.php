<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    protected $table = 'jenis_pembayarans';
    protected $fillable = [
        'nama_rekening',
        'nomor_rekening',
        'atas_nama',
        'aktif',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservation::class, 'id_jenis_pembayaran');
    }
}