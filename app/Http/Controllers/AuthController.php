<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|in:admin,siswa',
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            Auth::attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])
        ) {
            $request->session()->regenerate();

            if ($request->login === 'siswa') {
                if (Auth::user()->siswa) {
                    return redirect()->route('siswa.home');
                }
                Auth::logout();
                return back()->with('error', 'Login Gagal');
            }

            if ($request->login === 'admin') {
                if (!Auth::user()->siswa) {
                    return redirect()->route('admin.home');
                }
                Auth::logout();
                return back()->with('error', 'Login Gagal');
            }
        }
        return back()->with('error', 'Username atau password salah');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
