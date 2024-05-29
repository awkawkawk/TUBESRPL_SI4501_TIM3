<?php
// app/Http/Controllers/CampaignController.php

// app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaign.manage', compact('campaigns'));
    }

    public function create()
    {
        $campaigns = Campaign::all();
        return view('campaign.create', compact('campaigns'));
    }


    public function store(Request $request)
    {

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('campaign_photos', 'public');
        }

        $campaign = Campaign::create([
            'nama_campaign' => $request->nama_campaign,
            'foto_campaign' => $photoPath,
            'deskripsi_campaign' => $request->description,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'id_sekolah' => 1, // Assuming the user is authenticated as a school // auth()->user->id
            'status' => 'Menunggu Verifikasi',
        ]);

        $target = new Target([
            'type' => $request->input('jenis_donasi'),
            'money_amount' => $request->input('target_uang'),
        ]);

        if ($request->input('jenis_donasi') == 'goods' || $request->input('jenis_donasi') == 'money_and_goods') {
            $goods = [];
            $jumlahBarang = $request->input('jumlah_barang', []);
            foreach ($request->input('jenis_barang', []) as $key => $namaBarang) {
                $goods[] = [
                    'name' => $namaBarang,
                    'quantity' => $jumlahBarang[$key] ?? 1,
                ];
            }
            $target->goods = json_encode($goods);
        }

        $campaign->targets()->save($target);


        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil ditambahkan!');
    }

    public function edit(Campaign $campaign)
    {
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        // Handle the photo upload if a new photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('campaign_photos', 'public');
            $campaign->foto_campaign = $photoPath;
        }

        // Update the campaign details
        $campaign->nama_campaign = $request->nama_campaign;
        $campaign->deskripsi_campaign = $request->description;
        $campaign->save();

        // Update the associated target
        $target = $campaign->targets->first(); // Assuming there is only one target per campaign

        $target->type = $request->input('jenis_donasi');
        $target->money_amount = $request->input('target_uang', 0);

        if ($request->input('jenis_donasi') == 'goods' || $request->input('jenis_donasi') == 'money_and_goods') {
            $goods = [];
            $jumlahBarang = $request->input('jumlah_barang', []);
            foreach ($request->input('jenis_barang', []) as $key => $namaBarang) {
                $goods[] = [
                    'name' => $namaBarang,
                    'quantity' => $jumlahBarang[$key] ?? 1,
                ];
            }
            $target->goods = json_encode($goods);
        } else {
            $target->goods = null;
        }

        $target->save();

        return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil diperbarui!');
    }

    public function destroy(Campaign $campaign)
    {
        // Delete the campaign's image from storage
        if ($campaign->photo_campaign) {
            Storage::disk('public')->delete($campaign->photo_campaign);
        }

        // Delete associated targets
        $campaign->targets()->delete();

        // Delete the campaign
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully.');
    }

}
