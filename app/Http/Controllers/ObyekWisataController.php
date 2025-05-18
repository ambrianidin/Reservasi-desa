<?php

namespace App\Http\Controllers;

use App\Models\ObyekWisata;
use Illuminate\Http\Request;

class ObyekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ObyekWisata::all();
        return view('obyek_wisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obyek_wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255|unique:obyek_wisatas,nama_wisata',
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisatas,id',
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
                    ? $request->file($fotoKey)->store('obyek_wisata', 'public')
                    : null;
            }

        ObyekWisata::create([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi_wisata' => $request->deskripsi_wisata,
            'id_kategori_wisata' => $request->id_kategori_wisata,
            'fasilitas' => $request->fasilitas,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);
        return redirect('/obyek-wisata')->with('success', 'Berita berhasil ditambahkan');
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
        $obyeks = ObyekWisata::findOrFail($id); // Cari berita berdasarkan ID
        return view('obyek_wisata.edit', [
        'title' => 'Edit Wisata',
        'obyeks' => $obyeks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255|unique:obyek_wisatas,nama_wisata' . $id,
            'deskripsi_wisata' => 'required|string',
            'id_kategori_wisata' => 'required|exists:kategori_wisatas,id',
            'fasilitas' => 'required|string',
            'foto1' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto2' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'foto3' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto4' => 'image|mimes:jpeg,png,jpg|max:10000',
            'foto5' => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $obyeks = ObyekWisata::findOrFail($id);

        $fotoPaths = [];
            for ($i = 1; $i <= 5; $i++) {
                $fotoKey = "foto{$i}";
                $fotoPaths[$fotoKey] = $request->hasFile($fotoKey)
                    ? $request->file($fotoKey)->store('obyek_wisata', 'public')
                    : null;
            }

        $obyeks->update([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi_wisata' => $request->deskripsi_wisata,
            'id_kategori_wisata' => $request->id_kategori_wisata,
            'fasilitas' => $request->fasilitas,
            'foto1' => $fotoPaths['foto1'],
            'foto2' => $fotoPaths['foto2'],
            'foto3' => $fotoPaths['foto3'],
            'foto4' => $fotoPaths['foto4'],
            'foto5' => $fotoPaths['foto5'],
        ]);

        return redirect('/obyek-wisata')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obyeks = ObyekWisata::findOrFail($id);
        $obyeks->delete();
        return redirect('/obyek-wisata')->with('success', 'Berita berhasil dihapus');
    }
}
