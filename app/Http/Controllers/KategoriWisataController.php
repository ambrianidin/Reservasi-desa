<?php

namespace App\Http\Controllers;

use App\Models\KategoriWisata;
use Illuminate\Http\Request;

class KategoriWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'kategori_wisata' => 'required|string|max:255|unique:kategori_wisatas,kategori_wisata',
        ]);

        $kategoriW = KategoriWisata::create(['kategori_wisata' => $request->kategori_wisata]);

        $formData = [
            'nama_wisata' => $request->nama_wisata,
            'deskripsi_wisata' => $request->deskripsi_wisata,
            'fasilitas' => $request->fasilitas,
            'id_kategori_wisata' => $request->id_kategori_wisata,
        ];

        return redirect()->route('obyek-wisata.create')->with('form_data', $formData)->with('new_category_id', $kategoriW->id)->with('success', 'Kategori berhasil ditambahkan!');
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
