<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Semua waktu:
        $totalPendapatan = Reservation::where('status_reservasi_wisata', 'selesai')->sum('total_bayar');
        $totalReservasi = Reservation::count();
        $totalPendapatan = Reservation::whereMonth('created_at', now()->month)->sum('total_bayar');

        return view('owner.index', compact('totalPendapatan', 'totalReservasi'));
    }

    public function exportPDF()
    {
        $reservasis = Reservation::with('paket')
            ->orderBy('tgl_reservasi_wisata', 'desc')
            ->get();

        $pdf = Pdf::loadView('owner.report_pdf', compact('reservasis'));
        return $pdf->download('Laporan_Reservasi_Pemilik.pdf');
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
