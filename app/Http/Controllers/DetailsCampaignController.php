<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsCampaignController extends Controller
{
    public function showDetails($id){
        $details = Campaign::with('school','targets')
                    ->where('status', 'Sedang Berjalan')
                    ->where('id', $id)
                    ->get();

        $otherDetails = Campaign::with('school')
                    ->where('status', 'Sedang Berjalan')
                    ->where('id', '!=', $id)
                    ->get();

        return view('donation-details', compact('details','otherDetails'));
    }
}
