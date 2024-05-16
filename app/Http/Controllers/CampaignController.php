<?php
// app/Http/Controllers/CampaignController.php

// app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                // 'id_sekolah' => 'required|exists:schools,id', belum ada input untuk ini
                'nama_campaign' => 'required|string',
                'deskripsi_campaign' => 'required|string',
                // 'status' => 'required|string', // di hapus aja karena dibawah ada code static value
                'catatan_campaign' => 'nullable|string',
                'tanggal_dibuat' => 'required|date',
                'tanggal_selesai' => 'required|date'
            ]);
            $campaign = new Campaign();
            $campaign->id_sekolah = auth()->id(); //sebelumnya ini menggunakan pake math random, tidak dianjurkan karena punya relasi dengan table schools
            $campaign->nama_campaign = $request->nama_campaign;
            $campaign->deskripsi_campaign = $request->deskripsi_campaign;
            $campaign->status = 'Menunggu Verifikasi';
            $campaign->jenis_donasi = $request->jenis_donasi; //sebelumnya belum ada field jenis_donasi padahal mandatory
            $campaign->catatan_campaign = $request->catatan_campaign;
            $campaign->tanggal_dibuat = $request->tanggal_dibuat;
            $campaign->tanggal_selesai = $request->tanggal_selesai;
            if ($request->hasFile('foto_campaign')) {
                $campaign->foto_campaign = $request->file('foto_campaign')->store('public/campaign_photos');
            }
            $campaign->save();

            dd("berhasil save");
            // return redirect()->route('campaigns.index')->with('success', 'Kampanye berhasil ditambahkan!'); ini route belum ada
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

    }
}
