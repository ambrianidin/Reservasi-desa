<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('karyawan')
            ->whereIn('level', ['admin', 'bendahara', 'pemilik'])
            ->get();
        Log::info('Filtered Users', ['users' => $users->toArray()]);
        return view('userM.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userM.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|',
            'jabatan' => 'required|in:admin,bendahara,pemilik',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        // Buat pengguna baru di tabel users
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->jabatan,
            'aktif' => 1, // Aktif secara default
        ]);
        // Buat data karyawan di tabel karyawans
        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'status' => 'aktif',
            'id_user' => $user->id,
        ]);

        return redirect('/userM')->with('success', 'Pengguna berhasil ditambahkan.');
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
        $user = User::with('karyawan')->findOrFail($id);
        return view('userM.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $karyawan = $user->karyawan;

        $request->validate([
            'nama_karyawan' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $userData = [
            'email' => $request->email,
        ];
        // Hanya ubah password jika diisi
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
        // Jangan ubah 'aktif' kecuali ada input spesifik (misalnya checkbox)
        $user->update($userData);

        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/userM')->with('success', 'Pengguna berhasil diperbarui.');
    }
    // Ban pengguna
    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->aktif = 0; // Set aktif ke 0 (bukan 'banned')
        $user->save();

        if ($user->karyawan) {
            $user->karyawan->update(['status' => 'banned']);
        }
        if (Auth::check() && Auth::id() == $id) {
        Auth::logout();
        }

        return redirect('/userM')->with('success', 'Pengguna berhasil di-ban.');
    }

    
    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->aktif = 1;
        $user->save();
    
        if ($user->karyawan) {
            $user->karyawan->update(['status' => 'aktif']);
        }
    
        return redirect('/userM')->with('success', 'Pengguna berhasil di-unban.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
