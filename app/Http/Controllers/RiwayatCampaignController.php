<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;

class RiwayatCampaignController extends Controller
{
    public function index()
    {
        // $campaigns = Campaign::all();
        // return view('riwayatcampaign', compact('campaigns'));

        $user = Auth::user();
        $campaigns = Campaign::where('id_sekolah', $user->id)->get();
        return view('riwayatcampaign', compact('campaigns'));
    }
}
