<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penginapans = Homestay::all();
        return view('homestay.index', compact('penginapans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('homestay.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penginapan' => 'required|string|max:255|unique:penginapans,nama_penginapan',
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
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
                    ? $request->file($fotoKey)->store('homestay', 'public')
                    : null;
            }

        Homestay::create([
            'nama_penginapan' => $request->nama_penginapan,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);
        return redirect('/homestay')->with('success', 'Homestay berhasil ditambahkan');
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
        $homestays = Homestay::findOrFail($id);
        return view('homestay.edit', [
        'title' => 'Edit Homestay',
        'homestays' => $homestays,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_penginapan' => 'required|string|max:255|unique:penginapans,nama_penginapan,' . $id,
            'deskripsi' => 'required|string',
            'fasilitas' => 'required|string',
            'foto1' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto2' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto3' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto4' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto5' => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $penginapans = Homestay::findOrFail($id);

        $fotoPaths = [];
            for ($i = 1; $i <= 5; $i++) {
                $fotoKey = "foto{$i}";
                $fotoPaths[$fotoKey] = $request->hasFile($fotoKey)
                    ? $request->file($fotoKey)->store('homestay', 'public')
                    : null;
            }

        $penginapans->update([
            'nama_penginapan' => $request->nama_penginapan,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);

        return redirect('/homestay')->with('success', 'Homestay berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penginapans = Homestay::findOrFail($id);
        $penginapans->delete();
        return redirect('/homestay')->with('success', 'Homestay berhasil dihapus');
    }
}
