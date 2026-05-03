<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ConfirmReservController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasis = Reservation::with('paket')->latest()->get();
        return view('confirm-reservation.index', [
            'title' => 'Confirm Reservation'
        ], compact('reservasis'));
    }

   
    public function updateStatus(Request $request)
    {
        $reservasi = Reservation::findOrFail($request->reservasi_id);

        // Jika tombol centang diklik (artinya mengonfirmasi pembayaran)
        if ($request->has('confirm_pesan')) {
            $reservasi = Reservation::find($request->reservasi_id);
            $reservasi->status_reservasi_wisata = 'pesan';
            $reservasi->save();
            return back();
        }

        // Jika dropdown diubah ke "selesai" atau "batal"
        if ($request->status) {
            $reservasi->status_reservasi_wisata = $request->status;
            $reservasi->save();

            return redirect()->back()->with('success', 'Status reservasi diperbarui.');
        }

        return redirect()->back()->with('error', 'Tidak ada tindakan yang dipilih.');
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
