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
        $totalPendapatan = Reservation::sum('total_bayar');
        $totalReservasi = Reservation::count();
        $reservasiSelesai = Reservation::where('status_reservasi_wisata', 'selesai')->count();
        return view('owner.index', compact('totalPendapatan', 'totalReservasi', 'reservasiSelesai'));
    }

    public function dashboard(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan;

        $tahunList = Reservation::selectRaw('YEAR(tgl_reservasi_wisata) as tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc')
                        ->pluck('tahun');

        if ($tahunList->isEmpty()) {
            $tahunList = collect([date('Y')]);
        }

        $query = Reservation::whereYear('tgl_reservasi_wisata', $tahun);

        if ($bulan) {
            $query->whereMonth('tgl_reservasi_wisata', $bulan);
        }

        $totalPendapatan  = (clone $query)->sum('total_bayar');
        $totalReservasi   = (clone $query)->count();
        $reservasiSelesai = (clone $query)->where('status_reservasi_wisata', 'selesai')->count();

        return view('owner.index', compact(
            'totalPendapatan',
            'totalReservasi',
            'reservasiSelesai',
            'tahunList'
        ));
    }

    public function exportPDF(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan;

        $query = Reservation::with('paket')
            ->whereYear('tgl_reservasi_wisata', $tahun);

        if ($bulan) {
            $query->whereMonth('tgl_reservasi_wisata', $bulan);
        }

        $reservasis = $query
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
