<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'target_donation',
        'image_path',
        'status'
    ];

    // Define any relationships here if necessary
    public function store(Request $request)
{
    $campaign = new Campaign();
    $campaign->name = $request->input('name');
    $campaign->description = $request->input('description');
    $campaign->target_donation = $request->input('target_donation');
    // Untuk menyimpan file/image, pastikan telah mengkonfigurasi filesystems dan menambahkan logika untuk menyimpan file
    $campaign->save();

    return redirect()->route('campaigns.index')->with('success', 'Campaign berhasil ditambahkan');
}
}
