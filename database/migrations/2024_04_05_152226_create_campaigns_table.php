<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'target_donation' => 'nullable|numeric',
        'donation_type' => 'required|string',
        // Additional validations as needed
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
