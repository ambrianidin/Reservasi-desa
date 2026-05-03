<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBerita      = \App\Models\Berita::count();
        $totalUser        = \App\Models\User::whereIn('level', ['admin', 'bendahara', 'pemilik'])->where('aktif', 1)->count();
        $totalHomestay    = \App\Models\Homestay::count();
        $totalWisata      = \App\Models\ObyekWisata::count();
        $totalPaket       = \App\Models\PaketWisata::count();

        $userGrowth = $totalUser;

        $aktivitasTerbaru = collect([
            \App\Models\ObyekWisata::latest()->take(2)->get()->map(fn($i) => ['nama' => $i->nama_wisata, 'kategori' => 'Wisata']),
            \App\Models\Homestay::latest()->take(2)->get()->map(fn($i) => ['nama' => $i->nama_penginapan, 'kategori' => 'Homestay']),
            \App\Models\PaketWisata::latest()->take(1)->get()->map(fn($i) => ['nama' => $i->nama_paket, 'kategori' => 'Paket']),
        ])->flatten(1)->take(5);

        return view('admin.index', compact(
            'totalBerita', 'totalUser', 'totalHomestay',
            'totalWisata', 'totalPaket', 'userGrowth', 'aktivitasTerbaru'
        ));
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
