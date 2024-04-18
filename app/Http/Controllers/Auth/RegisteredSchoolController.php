<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SchoolVerification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredSchoolController extends Controller
{
    public function index(): View
    {
        return view('auth.register-school');
    }

    /**
     * Menangani permintaan registrasi yang masuk.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'school_name' => ['required', 'string', 'max:255'],
            'school_address' => ['required', 'string', 'max:255'],
            'school_phone' => ['required', 'string', 'max:15', 'min:11', 'unique:school_verifications'],
            'school_email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:school_verifications'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $schoolVerification = SchoolVerification::create([
            'school_name' => $request->school_name,
            'school_address' => $request->school_address,
            'school_phone' => $request->school_phone,
            'school_email' => $request->school_email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect atau tindakan lain setelah data berhasil disimpan
        return redirect(route('index'))->with('success', 'Registrasi sekolah berhasil. Silahkan tunggu verifikasi dari admin :)');
    }

    public function showVerificationPage()
    {
        $schools = SchoolVerification::all();
        return view('verifikasi-sekolah', compact('schools'));
    }
}