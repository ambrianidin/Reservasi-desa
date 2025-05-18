<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservasis';
    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'id_diskon',
        'email',
        'nama',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata',
    ];
    public function paket()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

}

