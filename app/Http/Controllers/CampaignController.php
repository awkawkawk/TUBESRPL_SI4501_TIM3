<?php
// app/Http/Controllers/CampaignController.php

// app/Http/Controllers/CampaignController.php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_sekolah' => 'required|exists:schools,id',
            'nama_campaign' => 'required|string',
            'deskripsi_campaign' => 'required|string',
            'status' => 'required|string',
            'catatan_campaign' => 'nullable|string',
            'tanggal_dibuat' => 'required|date',
            'tanggal_selesai' => 'required|date'
        ]);

        $campaign = new Campaign();
        $campaign->id_sekolah = $request->id_sekolah;
        $campaign->nama_campaign = $request->nama_campaign;
        $campaign->deskripsi_campaign = $request->deskripsi_campaign;
        $campaign->status = $request->status;
        $campaign->catatan_campaign = $request->catatan_campaign;
        $campaign->tanggal_dibuat = $request->tanggal_dibuat;
        $campaign->tanggal_selesai = $request->tanggal_selesai;
        $campaign->save();

        return redirect()->route('campaigns.index')->with('success', 'Kampanye berhasil ditambahkan!');
    }
}
