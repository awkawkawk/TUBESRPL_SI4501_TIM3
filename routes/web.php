<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\RegisteredSchoolController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\RiwayatCampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DonationItemController;
use App\Http\Controllers\RequestPencairanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailsCampaignController;
use App\Http\Controllers\RiwayatCampaignController;
use App\Http\Controllers\RegisteredSchoolController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\CampaignVerificationController;

// Route::get('/', function () {
//     return view('index');
// })->name('/');

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('/dashboard', [LandingPageController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

// Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');


// Route::get('/home', function () {
//     return view('create');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('index');
// })
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/search', [SearchController::class, 'search'])->name('search.result');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buatcampaign', function () {
        return view('create');
    });

    Route::get('/riwayat', function () {
        return view('riwayatcampaign');
    });

    Route::get('/riwayat/donatur', function () {
        return view('lihatdonatur');
    });

    Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

    Route::get('/verifikasi-campaign', [CampaignVerificationController::class, 'showVerificationPage'])->name('verifikasi.campaign');

    Route::post('/verifikasi-campaign/{id}', [CampaignVerificationController::class, 'respondVerification'])->name('response.verification.campaign');

    Route::get('/donation/item/summary', function () {
        return view('donation/summaryItems');
    });

    Route::get('/donasi', function () {
        return view('donation/index');
    });

    Route::get('/verifikasi-sekolah', [App\Http\Controllers\SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

// Route::get('/managedonation/item', function () {
//     return view('managedonation/edititem');
// });
    //test
    Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index'])->name('campaign.riwayat');
    Route::get('/campaign/riwayat/donatur/{campaignId}', [RiwayatCampaignController::class, 'donatur'])->name('lihat.donatur');

    Route::get('/donation/money/{id}', [DonationController::class, 'showForm'])->name('donations.form');
    Route::get('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary.get');
    Route::post('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary');
    Route::post('/donation/store', [DonationController::class, 'store'])->name('donations.store');

    Route::get('/campaign/detail/{id}', [DetailsCampaignController::class, 'showDetails'])->name('show.details');

Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

//riwayat campaign
Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index'])->name('campaign.riwayat');
Route::get('/campaign/riwayat/donatur/{campaignId}', [RiwayatCampaignController::class, 'donatur'])->name('lihat.donatur');

// money donation
Route::get('/donation', [DonationController::class, 'index'])->name('index.donation');
Route::get('/donation/money/{id}', [DonationController::class, 'showForm'])->name('donations.form');
Route::get('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary.get');
Route::post('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary');
Route::post('/donation/store', [DonationController::class, 'store'])->name('donations.store');

// manage money donation
Route::get('/edit/donation/money', [DonationController::class, 'editMoney'])->name('donationMoney.edit');
Route::get('/edit/donation/money/{id}', [DonationController::class, 'showform_editMoney'])->name('moneyform.edit');
Route::post('/edit/donation/money/summary', [DonationController::class, 'showSummaryEdit'])->name('donation.summary.edit');
Route::put('/edit/donation/update/{id}', [DonationController::class, 'update'])->name('donations.update');
Route::delete('/donation/delete/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');


// item donation
Route::get('/donation/item/{id}', [DonationItemController::class, 'showFormItem'])->name('donations.form.items');
Route::post('/donation/item/{id}', [DonationItemController::class, 'postFormItem'])->name('donations.post.form.items');
Route::post('/donation/storeItems', [DonationItemController::class, 'storeItems'])->name('donations.storeItems');

// manage item donation
Route::get('/edit/donation/item', [DonationItemController::class, 'editItem'])->name('donationItem.edit');
Route::get('/edit/donation/item/{id}', [DonationItemController::class, 'showform_editItem'])->name('itemform.edit');
Route::put('/edit/donation/item/{id}', [DonationItemController::class, 'updateItem'])->name('donations.edit');
Route::delete('/donation/item/delete/{id}', [DonationItemController::class, 'destroy'])->name('donations.item.destroy');

    Route::get('/donation/item/{id}', [DonationItemController::class, 'showFormItem'])->name('donations.form.items');
    Route::post('/donation/item/{id}', [DonationItemController::class, 'postFormItem'])->name('donations.post.form.items');
    Route::post('/donation/storeItems', [DonationItemController::class, 'storeItems'])->name('donations.storeItems');
    Route::get('/donation', [DonationController::class, 'index'])->name('index.donation');
});

Route::middleware('roles:admin')->group(function () {
    Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');
    Route::post('/verifikasi-sekolah/{id}', [SchoolVerificationController::class, 'respondVerification'])->name('response.verification');
});

Route::middleware('roles:sekolah')->group(function () {
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
});

Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
});

Route::resource('schools', SchoolController::class);

Route::get('/pencairan', [RequestPencairanController::class, 'index'])->name('list.pencairan');
Route::get('/pencairan/{RequestPencairan}/request', [RequestPencairanController::class, 'request'])->name('pencairan.request');
Route::put('/pencairan/{RequestPencairan}', [RequestPencairanController::class, 'create'])->name('pencairan.create');
Route::get('/pencairan/history', [RequestPencairanController::class, 'history'])->name('pencairan.history');

//test fe
Route::get('/managedonation/money/edit/id', function () {
    return view('managedonation/formeditmoney');
});

require __DIR__.'/auth.php';