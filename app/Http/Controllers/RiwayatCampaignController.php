<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Target;

class RiwayatCampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('riwayatcampaign', compact('campaigns'));
    }
}
