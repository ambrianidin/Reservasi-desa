<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return view('newsM.index', [
            'title' => 'News Management',
            'beritas' => $beritas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsM.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255|unique:beritas,judul',
            'berita' => 'required|string',
            'tgl_post' => 'required|date',
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:10000',
            'id_kategori_berita' => 'required|exists:kategori_beritas,id',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'berita' => $request->berita,
            'tgl_post' => $request->tgl_post,
            'foto' => $fotoPath,
            'id_kategori_berita' => $request->id_kategori_berita,
        ]);
        return redirect('/newsM')->with('success', 'Berita berhasil ditambahkan');
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
        $berita = Berita::findOrFail($id); // Cari berita berdasarkan ID
        return view('newsM.edit', [
        'title' => 'Edit Berita',
        'berita' => $berita,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255|unique:beritas,judul,' . $id,
            'berita' => 'required|string',
            'tgl_post' => 'required|date',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:10000',
            'id_kategori_berita' => 'required|exists:kategori_beritas,id',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('berita', 'public');
            $berita->foto = $fotoPath;
        }

        $berita->update([
            'judul' => $request->judul,
            'berita' => $request->berita,
            'tgl_post' => $request->tgl_post,
            'id_kategori_berita' => $request->id_kategori_berita,
        ]);

        return redirect('/newsM')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect('/newsM')->with('success', 'Berita berhasil dihapus');
    }
}
