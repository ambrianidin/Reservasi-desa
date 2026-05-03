<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPembayaran;

class JenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisPembayaran::latest()->get();

        return view('jenisPembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('jenisPembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rekening' => 'required',
            'nomor_rekening' => 'required',
            'atas_nama' => 'required',
        ]);

        JenisPembayaran::create([
            'nama_rekening' => $request->nama_rekening,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'aktif' => $request->aktif ?? 1
        ]);

        return redirect()->route('jenisPembayaran')
            ->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = JenisPembayaran::findOrFail($id);

        return view('jenisPembayaran.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = JenisPembayaran::findOrFail($id);

        $data->update([
            'nama_rekening' => $request->nama_rekening,
            'nomor_rekening' => $request->nomor_rekening,
            'atas_nama' => $request->atas_nama,
            'aktif' => $request->aktif ?? 0
        ]);

        return redirect()->route('jenisPembayaran')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        JenisPembayaran::findOrFail($id)->delete();

        return redirect()->route('jenisPembayaran')
            ->with('success','Data berhasil dihapus');
    }
}
