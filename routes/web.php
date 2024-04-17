<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

Route::get('/', function () {
    return view('buatcampaigns');
});

Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');

Route::get('/campaignss', [CampaignController::class, 'index']);



