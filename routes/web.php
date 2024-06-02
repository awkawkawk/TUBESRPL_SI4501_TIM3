<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailsCampaignController;
use App\Http\Controllers\CampaignVerificationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\RegisteredSchoolController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\RiwayatCampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationItemController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DonaturController;

Route::get('/', function () {
    return view('index');
})->name('/');


Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

// Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');

Route::get('/home', function () {
    return view('create');
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

Route::get('/riwayat', function () {
    return view('riwayatcampaign');
});

Route::get('/edit/donatur', [DonaturController::class, 'index'])->name('admin.donatur.index');


Route::get('/riwayat/donatur', function () {
    return view('lihatdonatur');
});

Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

Route::get('/verifikasi-campaign', [CampaignVerificationController::class, 'showVerificationPage'])->name('verifikasi.campaign');

Route::post('/verifikasi-campaign/{id}', [CampaignVerificationController::class, 'respondVerification'])->name('response.verification.campaign');

Route::get('/search', [SearchController::class, 'search'])->name('search.result');

Route::get('/donation/item/summary', function () {
    return view('donation/summaryItems');
});

Route::get('/donasi', function () {
    return view('donation/index');
});

Route::get('/verifikasi-sekolah', [App\Http\Controllers\SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

//test
Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index'])->name('campaign.riwayat');
Route::get('/campaign/riwayat/donatur/{campaignId}', [RiwayatCampaignController::class, 'donatur'])->name('lihat.donatur');

Route::get('/donation', [DonationController::class, 'index'])->name('index.donation');
Route::get('/donation/money/{id}', [DonationController::class, 'showForm'])->name('donations.form');
Route::get('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary.get');
Route::post('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary');
Route::post('/donation/store', [DonationController::class, 'store'])->name('donations.store');

Route::get('/donation/item/{id}', [DonationItemController::class, 'showFormItem'])->name('donations.form.items');
Route::post('/donation/item/{id}', [DonationItemController::class, 'postFormItem'])->name('donations.post.form.items');
Route::post('/donation/storeItems', [DonationItemController::class, 'storeItems'])->name('donations.storeItems');


Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

Route::post('/verifikasi-sekolah/{id}', [SchoolVerificationController::class, 'respondVerification'])->name('response.verification');

Route::get('/campaign/detail/{id}', [DetailsCampaignController::class, 'showDetails'])->name('show.details');

Route::prefix('admin')->group(function () {
    Route::prefix('manage/berita')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('admin.berita.index');
        Route::get('/create', [NewsController::class, 'create'])->name('admin.berita.create');
        Route::post('/', [NewsController::class, 'store'])->name('admin.berita.store');
        Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
        Route::post('/{id}', [NewsController::class, 'update'])->name('admin.berita.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('admin.berita.delete');
        Route::get('/{id}', [NewsController::class, 'detail'])->name('admin.berita.detail');
    });
});


require __DIR__.'/auth.php';
