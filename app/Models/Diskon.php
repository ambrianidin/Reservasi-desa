<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskons';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'nama_diskon',
        'persentase_diskon',
        'nilai_diskon',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status',
    ];
}