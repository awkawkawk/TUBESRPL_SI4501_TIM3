<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Target;
use App\Models\Donation;
use App\Models\ItemDonation;
use App\Models\MoneyDonation;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Auth;

class RiwayatCampaignController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $campaigns = Campaign::where('id_sekolah', $user->id)->get();
        return view('riwayatcampaign', compact('campaigns'));


    }

    public function donatur($campaignId)
    {
        // Ambil kampanye berdasarkan ID
        $campaign = Campaign::findOrFail($campaignId);

        // Ambil semua donasi untuk kampanye ini
        $donations = Donation::where('id_campaign', $campaignId)->get();

        return view('lihatdonatur', compact('campaign', 'donations'));
    }
}
