<?php
// app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Target;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'donation_type' => 'required|string',
            'target_donation' => 'required_if:donation_type,money,money_and_goods|numeric',
            'goods_type' => 'array|required_if:donation_type,goods,money_and_goods',
            'goods_amount' => 'array|required_with:goods_type'
        ]);

        $campaign = new Campaign();
        $campaign->user_id = auth()->id();  // Asumsi user logged in
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->photo = $request->file('image') ? $request->file('image')->store('public/campaigns') : null;
        $campaign->save();

        if ($request->donation_type !== 'goods') {
            $target = new Target([
                'type' => 'money',
                'description' => 'Target Uang',
                'amount' => $request->target_donation
            ]);
            $campaign->targets()->save($target);
        }

        if ($request->donation_type !== 'money') {
            foreach ($request->goods_type as $index => $goods_type) {
                $target = new Target([
                    'type' => 'goods',
                    'description' => $goods_type,
                    'amount' => $request->goods_amount[$index]
                ]);
                $campaign->targets()->save($target);
            }
        }

        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil ditambahkan!');
    }
}
