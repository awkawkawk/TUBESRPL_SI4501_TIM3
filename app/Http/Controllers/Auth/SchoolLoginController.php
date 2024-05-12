<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SchoolLoginController extends Controller
{
    public function showLoginForm()
    {
        // dd(Auth::guard('schools'));
        return view('auth.school-login');
    }

    public function login(Request $request)
    {
       $credentials = $request->only('email_sekolah', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->intended('/dashboard'); // Redirect ke halaman setelah login berhasil
        } else {
            // Jika autentikasi gagal
            return back()->withErrors(['email_sekolah' => 'Email atau password salah']); // Redirect kembali dengan pesan error
        }
    }
}
