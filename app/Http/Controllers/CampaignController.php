<?php
// app/Httap/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            'id_sekolah' => 1, // Assuming the user is authenticated as a school // auth()->user->id
            'status' => 'pending',
        ]);

        // Handle targets based on jenis_donasi
        $jenisDonasi = $request->input('jenis_donasi');

        if ($jenisDonasi == 'money') {
            $campaign->targets()->create([
                'nama_barang' => 'Uang',
                'jumlah_barang' => $request->input('target_uang'),
            ]);
        } elseif ($jenisDonasi == 'goods' || $jenisDonasi == 'money_and_goods') {
            if ($jenisDonasi == 'money_and_goods') {
                $campaign->targets()->create([
                    'nama_barang' => 'Uang',
                    'jumlah_barang' => $request->input('target_uang'),
                ]);
            }

            $jumlahBarang = $request->input('jumlah_barang', []);
            $jenisBarang = $request->input('jenis_barang', []);

            foreach ($jenisBarang as $key => $namaBarang) {
                if (isset($jumlahBarang[$key])) {
                    $campaign->targets()->create([
                        'nama_barang' => $namaBarang,
                        'jumlah_barang' => $jumlahBarang[$key],
                    ]);
                }
            }
// dev
            // dd("berhasil save");
            // return redirect()->route('campaigns.index')->with('success', 'Kampanye berhasil ditambahkan!'); ini route belum ada
//         } catch (\Throwable $e) {
//             dd($e->getMessage());
        }

        return redirect()->route('campaign.riwayat')->with('success', 'Campaign berhasil ditambahkan!');
    }

    public function edit(Campaign $campaign)
    {
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('campaign_photos', 'public');
            $campaign->foto_campaign = $photoPath;
        }

        // Update campaign details
        $campaign->nama_campaign = $request->nama_campaign;
        $campaign->deskripsi_campaign = $request->description;
        $campaign->save();

        // Delete existing targets
        $campaign->targets()->delete();

        // Handle targets based on jenis_donasi
        $jenisDonasi = $request->input('jenis_donasi');

        if ($jenisDonasi == 'money') {
            $campaign->targets()->create([
                'nama_barang' => 'Uang',
                'jumlah_barang' => $request->input('target_uang'),
            ]);
        } elseif ($jenisDonasi == 'goods' || $jenisDonasi == 'money_and_goods') {
            if ($jenisDonasi == 'money_and_goods') {
                $campaign->targets()->create([
                    'nama_barang' => 'Uang',
                    'jumlah_barang' => $request->input('target_uang'),
                ]);
            }

            $jumlahBarang = $request->input('jumlah_barang', []);
            $jenisBarang = $request->input('jenis_barang', []);

            foreach ($jenisBarang as $key => $namaBarang) {
                if (isset($jumlahBarang[$key])) {
                    $campaign->targets()->create([
                        'nama_barang' => $namaBarang,
                        'jumlah_barang' => $jumlahBarang[$key],
                    ]);
                }
            }
        }

        return redirect()->route('campaign.riwayat')->with('success', 'Campaign berhasil diperbarui!');
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

    public function history()
    {
        $donations = Donation::all();;
        return view('campaign.history', compact('donations'));
    }
    
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'target_donation' => 'nullable|numeric',
    //         'donation_type' => 'required|string',
    //         // Tambahkan validasi lain sesuai kebutuhan
    //     ]);

    //     // Handle File Upload
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('campaign_images', 'public');
    //     }

    //     $campaign = new Campaign();
    //     $campaign->name = $request->name;
    //     $campaign->description = $request->description;
    //     $campaign->image = $imagePath ?? null; // Save the path of the image
    //     $campaign->target_donation = $request->target_donation;
    //     $campaign->donation_type = $request->donation_type;
    //     $campaign->save();

    //     return redirect()->route('daftar')->with('success', 'Campaign berhasil ditambahkan!');
    // }
}
