<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketWisatas = PaketWisata::all();
        return view('paket.index', compact('paketWisatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255|unique:paket_wisatas,nama_paket',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'harga_per_pack' => 'required|numeric',
            'foto1' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto2' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto3' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto4' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto5' => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $fotoPaths = [];
        for ($i = 1; $i <= 5; $i++) {
            $fotoKey = "foto{$i}";
            $fotoPaths[$fotoKey] = $request->hasFile($fotoKey)
                ? $request->file($fotoKey)->store('paket', 'public')
                : null;
        }

        PaketWisata::create([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'harga_per_pack' => $request->harga_per_pack,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);

        return redirect('/paketwisata')->with('success', 'Paket wisata created successfully.');
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
        $paketwisata = PaketWisata::findOrFail($id);
        return view('paket.edit', [
        'title' => 'Edit Paket Wisata',
        'paketwisata' => $paketwisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'harga_per_pack' => 'required|numeric',
            'foto1' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto2' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto3' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto4' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto5' => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $paketwisata = PaketWisata::findOrFail($id);

        $fotoPaths = [];
        for ($i = 1; $i <= 5; $i++) {
            $fotoKey = "foto{$i}";
            $fotoPaths[$fotoKey] = $request->hasFile($fotoKey)
                ? $request->file($fotoKey)->store('paket', 'public')
                : null;
        }

        $paketwisata->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'harga_per_pack' => $request->harga_per_pack,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);

        return redirect('/paketwisata')->with('success', 'Paket wisata updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paketwisata = PaketWisata::findOrFail($id);
        $paketwisata->delete();
        return redirect('/paketwisata')->with('success', 'Paket wisata deleted successfully.');
    }
}
