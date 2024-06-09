<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CampaignVerificationController extends Controller
{
    public function index(): View
    {
        return view('auth.register-school');
    }

    public function showVerificationPage()
    {
        $campaigns = Campaign::with('school', 'targets')->where('status', 'pending')->get();
        return view('verifikasi-campaign', compact('campaigns'));
    }

    public function respondVerification(Request $request, $id)
    {
        $campaignsVerification = Campaign::findOrFail($id);

        if ($request->input('response') == 'confirm') {
            // dd('valid' , $campaignsVerification);
            $campaignsVerification->update(['status' => 'valid']);
        } elseif ($request->input('response') == 'decline') {
            // Ambil pesan catatan dari request
            $pesan = $request->input('catatan');
            $campaignsVerification->update(['status' => 'ditolak', 'catatan_campaign' => $pesan]);
        }

        return redirect()->back()->with('success', 'Respon berhasil disimpan');
    }
}
