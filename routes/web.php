<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredSchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatCampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationItemController;

Route::get('/', function () {
    return view('index');
})->name('/');


Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

// Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');

Route::get('/home', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/buatcampaign', function () {
    return view('buatcampaign');
});


Route::get('/riwayat/donatur', function () {
    return view('lihatdonatur');
});



Route::get('/donation/item/summary', function () {
    return view('donation/summaryItems');
});

Route::get('/donasi', function () {
    return view('donation/index');
});


Route::get('/verifikasi-sekolah', [App\Http\Controllers\SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');


//test
Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index']);

Route::get('/donation', [DonationController::class, 'index']);
Route::get('/donation/money/{id}', [DonationController::class, 'showForm'])->name('donations.form');
Route::get('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary.get');
Route::post('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary');
Route::post('/donation/store', [DonationController::class, 'store'])->name('donations.store');

Route::get('/donation/item/{id}', [DonationItemController::class, 'showFormItem'])->name('donations.form.items');
Route::post('/donation/item/summaryItems', [DonationItemController::class, 'showSummaryItem'])->name('donation.summaryItems');

Route::post('/donation/storeItems', [DonationItemController::class, 'storeItems'])->name('donations.storeItems');




