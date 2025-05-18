<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = PaketWisata::all();
        return view('reservation.index', ['title' => 'Reservation'], compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_paket)
    {
        if (!Auth::check()) {
            return redirect()->route('login-pelanggan');
        }
        
        $user = Auth::user();
        $pelanggan = Pelanggan::where('id_user', $user->id)->first();

        $paket = PaketWisata::findOrFail($id_paket);
        $diskons = Diskon::where('status', 'aktif')->get();

        return view('reservation.index', ['title' => 'Reservation'], compact('paket', 'diskons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login-pelanggan')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $user = Auth::user();
        $pelanggan = Pelanggan::where('id_user', $user->id)->first();

        $request->validate([
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',            
            'jumlah_peserta' => 'required|integer|min:1',
            'id_paket' => 'required',
            'harga' => 'required|numeric',
            'total_bayar' => 'required|numeric',
            'file_bukti_tf' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        
        $tanggalGabungan = $request->tanggal_mulai . ' s.d ' . $request->tanggal_selesai;

        $totalPeserta = Reservation::whereDate('tgl_reservasi_wisata', $request->tgl_reservasi_wisata)->sum('jumlah_peserta');

        $sisaKuota = 50 - $totalPeserta;

        if ($request->jumlah_peserta > $sisaKuota) {
            return back()->withErrors([
                'jumlah_peserta' => "Kuota tersisa: $sisaKuota orang"])->withInput();
        }

        $fileName = null;

        if ($request->hasFile('file_bukti_tf')) {
            $fileName = time() . '_' . $request->file('file_bukti_tf')->getClientOriginalName();
            $request->file('file_bukti_tf')->storeAs('public/bukti_transfer', $fileName);
        }

        Reservation::create([
            'id_pelanggan' => $pelanggan->id,
            'id_paket' => $request->id_paket,
            'id_diskon' => $request->id_diskon,
            'email' => $user->email,
            'nama' => $pelanggan->nama_lengkap,
            'tgl_reservasi_wisata' =>$tanggalGabungan,
            'harga' => $request->harga,
            'jumlah_peserta' => $request->jumlah_peserta,
            'total_bayar' => $request->total_bayar,
            'file_bukti_tf' => $fileName,
            'status_reservasi_wisata' => 'pesan',
        ]);

        return redirect()->route('history-reservasi', $user->id)->with('success', 'Reservasi berhasil!');
    }

    public function history()
    {
        $user = Auth::user();

        $reservasis = Reservation::whereHas('pelanggan', function ($query) use ($user) {
            $query->where('id_user', $user->id);
        })->with('paket')->latest()->get();

        return view('reservation.riwayat', ['title' => 'History'], compact('reservasis'));
    }
    public function cetakNota($id)
    {
        $reservasi = Reservation::with('paket')->findOrFail($id);

        $pdf = Pdf::loadView('reservation.nota_pdf', compact('reservasi'))
                ->setPaper('A5', 'portrait');

        return $pdf->download('Nota_Reservasi_' . $reservasi->id . '.pdf');
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
