<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ObyekWisata;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = PaketWisata::all();
        $beritas = Berita::with('kategori')->latest()->take(3)->get();
        $obyekwisatas = ObyekWisata::with('kategoriWisata')->latest()->take(6)->get();

        return view('news.index', [
            'title' => 'News',
            'pakets' => $pakets,
            'beritas' => $beritas,
            'obyekwisatas' => $obyekwisatas,
        ]);
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
    public function show($id)
    {
        $berita = Berita::where('id', $id)->firstOrFail();
        return view('news.detail', [
            'title' => 'News-Detail',
        ], compact('berita'));
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
