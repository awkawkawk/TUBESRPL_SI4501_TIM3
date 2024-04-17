<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();  // Fetch all campaigns
        return view('profile.campaigns.index', compact('campaigns'));  // Return a view and pass the campaigns data
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target_donation' => 'nullable|numeric',
            'donation_type' => 'required|string',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Handle File Upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
        }

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->image = $imagePath ?? null; // Save the path of the image
        $campaign->target_donation = $request->target_donation;
        $campaign->donation_type = $request->donation_type;
        $campaign->save();

        return redirect()->route('daftar')->with('success', 'Campaign berhasil ditambahkan!');
    }

}