<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DonationVerificationController extends Controller
{
    public function showVerificationPage()
    {
        // $donations = Donation::where('status', 'Pending')->get();
        $donations = Donation::with('user','campaign','donation_items')
                    ->where('status', 'Pending')
                    ->get();
        return view('verifikasi-donasi', compact('donations'));
    }

    public function respondVerification(Request $request, $id)
    {
        $donationVerification = Donation::findOrFail($id);
        if ($request->input('response') === 'confirm') {
            $donationVerification->update(['status' => 'valid']);
            // dd($donationVerification);
        } elseif ($request->input('response') === 'decline') {
            $donationVerification->update(['status' => 'ditolak']);
        }

        return redirect()->back()->with('success', 'Respon berhasil disimpan');
    }
}
