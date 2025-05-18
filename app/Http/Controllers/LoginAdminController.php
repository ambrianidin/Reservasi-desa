<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('be.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->aktif == 0) {
            Auth::logout();
            return redirect()->back()->with('error', 'Akun Anda telah dinonaktifkan.');
            }

            if (!in_array($user->level, ['admin', 'bendahara', 'pemilik'])) {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun ini tidak memiliki akses sebagai karyawan.');
            }

            if ($user->level == 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->level == 'bendahara') {
                return redirect()->intended('/bendahara');
            } elseif ($user->level == 'pemilik') {
                return redirect()->intended('/pemilik');
            }
        }
        return redirect('/login-karyawan')->with('error', 'Email atau password salah!');
    }
    public function logout(){
        Auth::guard('karyawan')->logout();
        return redirect('/login-karyawan');
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
