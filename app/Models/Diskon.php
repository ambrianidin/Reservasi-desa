<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected static function booted()
    {
        static::retrieved(function ($diskon) {

            $today = Carbon::today();

            if ($diskon->tanggal_mulai > $today) {
                $statusBaru = 'nonaktif';
            } elseif ($diskon->tanggal_berakhir < $today) {
                $statusBaru = 'expired';
            } else {
                $statusBaru = 'aktif';
            }

            if ($diskon->status !== $statusBaru) {
                $diskon->status = $statusBaru;
                $diskon->saveQuietly();
            }

        });
    }
}