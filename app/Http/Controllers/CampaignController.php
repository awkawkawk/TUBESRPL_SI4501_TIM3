<?php
// app/Httap/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
            $file = $request->file('photo')->getRealPath();

            // Unggah file ke Cloudinary ke dalam folder 'bukti'
            $uploadResult = cloudinary()
                ->upload($file, [
                    'folder' => 'bukti',
                ])
                ->getSecurePath();
        }

        $campaign = Campaign::create([
            'nama_campaign' => $request->nama_campaign,
            'foto_campaign' => $uploadResult,
            'deskripsi_campaign' => $request->description,
            'id_sekolah' => Auth::user()->id_sekolah, // Assuming the user is authenticated as a school // auth()->user->id
            'status' => 'pending',
            'jenis_donasi' => $request->input('jenis_donasi')
        ]);


        // Handle targets based on jenis_donasi
        $jenisDonasi = $request->input('jenis_donasi');

        if ($jenisDonasi == 'uang') {
            $campaign->targets()->create([
                'nama_barang' => 'Uang',
                'jumlah_barang' => $request->input('target_uang'),
            ]);
        } elseif ($jenisDonasi == 'barang' || $jenisDonasi == 'uang_barang') {

            if ($jenisDonasi == 'uang_barang') {
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
        
        // return dd($request->jenis_barang);
        
        // Update campaign details
        // dd($campaign);  
        $campaign->nama_campaign = $request->nama_campaign;
        $campaign->deskripsi_campaign = $request->description;
        //$campaign->id_sekolah = Auth::user()->id_sekolah; // Menetapkan id sekolah berdasarkan sekolah yang login
        $campaign->save();

        // Delete existing targets
        $campaign->targets()->delete();

        // Handle targets based on jenis_donasi
        $jenisDonasi = $request->input('jenis_donasi');

        if ($jenisDonasi == 'uang') {
            $campaign->targets()->create([
                'nama_barang' => 'Uang',
                'jumlah_barang' => $request->input('target_uang'),
            ]);
        } elseif ($jenisDonasi == 'barang' || $jenisDonasi == 'uang_barang') {
            if ($jenisDonasi == 'uang_barang') {
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
