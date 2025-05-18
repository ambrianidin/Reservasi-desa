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
        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'status' => 'required|in:pesan,dibayar,selesai,batal'
        ]);

        $reservasi = Reservation::findOrFail($request->reservasi_id);

        // Jika klik tombol ✔ konfirmasi, ubah ke "dibayar"
        if ($request->has('confirm_bayar')) {
            $reservasi->update(['status_reservasi_wisata' => 'dibayar']);
            return back()->with('success', 'Reservasi telah dikonfirmasi sebagai Dibayar.');
        }

        // Jika tidak klik tombol, ubah status sesuai dropdown
        $reservasi->update(['status_reservasi_wisata' => $request->status]);
        return back()->with('success', 'Status reservasi berhasil diperbarui ke ' . ucfirst($request->status) . '.');
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
