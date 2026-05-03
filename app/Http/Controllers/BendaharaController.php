<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPendapatan = \App\Models\Reservation::sum('total_bayar');
        $totalReservasi  = \App\Models\Reservation::count();
        $reservasiSelesai = \App\Models\Reservation::where('status_reservasi_wisata', 'selesai')->count();
        $diskonAktif     = \App\Models\Diskon::where('status', 'aktif')
                            ->orWhere(function($q) {
                                $q->whereDate('tanggal_mulai', '<=', now())
                                ->whereDate('tanggal_berakhir', '>=', now());
                            })->get();

        return view('bendahara.index', [
            'title'           => 'Bendahara Dashboard',
            'totalPendapatan' => $totalPendapatan,
            'totalReservasi'  => $totalReservasi,
            'reservasiSelesai'=> $reservasiSelesai,
            'diskonAktif'     => $diskonAktif,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
