<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DonationItemController;
use App\Http\Controllers\ReportingProofController;
use App\Http\Controllers\DetailsCampaignController;
use App\Http\Controllers\RiwayatCampaignController;
use App\Http\Controllers\RegisteredSchoolController;
use App\Http\Controllers\RequestPencairanController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\CampaignVerificationController;
use App\Http\Controllers\DonationVerificationController;

// Route::get('/', function () {
//     return view('index');
// })->name('/');

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('/dashboard', [LandingPageController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

// Detail campaign
Route::get('/campaign/detail/{id}', [DetailsCampaignController::class, 'showDetails'])->name('show.details');

// ! DONATUR !
Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Donasi Uang
    Route::get('/donation', [DonationController::class, 'index'])->name('index.donation');
    Route::get('/donation/money/{id}', [DonationController::class, 'showForm'])->name('donations.form');
    Route::get('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary.get');
    Route::post('/donation/money/summary', [DonationController::class, 'showSummary'])->name('donation.summary');
    Route::post('/donation/store', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donation/history', [CampaignController::class, 'history'])->name('campaign.history');

    // Donasi Barang
    Route::get('/donation/item/{id}', [DonationItemController::class, 'showFormItem'])->name('donations.form.items');
    Route::post('/donation/item/{id}', [DonationItemController::class, 'postFormItem'])->name('donations.post.form.items');
    Route::post('/donation/storeItems', [DonationItemController::class, 'storeItems'])->name('donations.storeItems');
});

// ! ADMIN
Route::prefix('admin')->group(function () {
    Route::middleware('roles:admin')->group(function () {
        // verifikasi sekolah
        Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');
        Route::post('/verifikasi-sekolah/{id}', [SchoolVerificationController::class, 'respondVerification'])->name('response.verification');

        Route::get('/dashboard/edufund', [DashboardController::class, 'index'])->name('dashboard_edufund');

        Route::get('/verifikasi-campaign', [CampaignVerificationController::class, 'showVerificationPage'])->name('verifikasi.campaign');
        Route::post('/verifikasi-campaign/{id}', [CampaignVerificationController::class, 'respondVerification'])->name('response.verification.campaign');

        Route::get('/verifikasi-donasi', [DonationVerificationController::class, 'showVerificationPage'])->name('verifikasi.donasi');
        Route::post('/verifikasi-donasi/{id}', [DonationVerificationController::class, 'respondVerification'])->name('response.verification.donation');
        Route::post('/verifikasi-campaign/{id}', [CampaignVerificationController::class, 'respondVerification'])->name('response.verification.campaign');

        // manage money donation
        Route::get('/edit/donation/money', [DonationController::class, 'editMoney'])->name('donationMoney.edit');
        Route::get('/edit/donation/money/{id}', [DonationController::class, 'showform_editMoney'])->name('moneyform.edit');
        Route::post('/edit/donation/money/summary', [DonationController::class, 'showSummaryEdit'])->name('donation.summary.edit');
        Route::put('/edit/donation/update/{id}', [DonationController::class, 'update'])->name('donations.update');
        Route::delete('/donation/delete/{id}', [DonationController::class, 'destroy'])->name('donations.destroy');
        Route::get('/donation/history', [CampaignController::class, 'history'])->name('campaign.riwayat');
        

        // manage item donation
        Route::get('/edit/donation/item', [DonationItemController::class, 'editItem'])->name('donationItem.edit');
        Route::get('/edit/donation/item/{id}', [DonationItemController::class, 'showform_editItem'])->name('itemform.edit');
        Route::put('/edit/donation/item/{id}', [DonationItemController::class, 'updateItem'])->name('donations.edit');
        Route::delete('/donation/item/delete/{id}', [DonationItemController::class, 'destroy'])->name('donations.item.destroy');

        Route::get('edit/donatur/{id}', [DonaturController::class, 'edit'])->name('admin.donatur.edit');
        Route::get('/donatur', [DonaturController::class, 'index'])->name('admin.donatur.index');
        Route::put('edit/donatur/{id}', [DonaturController::class, 'update'])->name('admin.donatur.update');
        Route::get('/donatur/{id}', [DonaturController::class, 'destroy'])->name('admin.donatur.destroy');

        // edit berita
        Route::prefix('manage/berita')->group(function () {
            Route::get('/news', [NewsController::class, 'index'])->name('admin.berita.index');
            Route::get('/create', [NewsController::class, 'create'])->name('admin.berita.create');
            Route::post('/news', [NewsController::class, 'store'])->name('admin.berita.store');
            Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('admin.berita.edit');
            Route::post('/{id}', [NewsController::class, 'update'])->name('admin.berita.update');
            Route::delete('/{id}', [NewsController::class, 'destroy'])->name('admin.berita.delete');
            Route::get('/{id}', [NewsController::class, 'detail'])->name('admin.berita.detail');
        });
    });
});

Route::middleware('roles:admin')->group(function () {
    Route::get('/proof', [ReportingProofController::class, 'index'])->name('report.proof');
    Route::get('admin/pencairan', [RequestPencairanController::class, 'AdminIndex'])->name('admin.list.pencairan');
    Route::get('admin/pencairan/{RequestPencairan}/{History}/acc', [RequestPencairanController::class, ''])->name('pencairan.acc');
    Route::put('admin/pencairan/{RequestPencairan}/{History}', [RequestPencairanController::class, 'adminVerification'])->name('pencairan.response');
    Route::get('admin/pencairan/history', [RequestPencairanController::class, 'adminHistory'])->name('pencairan.history.admin');
});

// ! SEKOLAH
Route::middleware('roles:sekolah,admin')->group(function () {
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');

    // ini campaigns lagi
    Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
    Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
    Route::get('/donation/history', [CampaignController::class, 'history'])->name('campaigns.history');
    Route::put('/update/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');

    //riwayat campaign
    Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index'])->name('campaign.riwayat');
    Route::get('/campaign/riwayat/donatur/{campaignId}', [RiwayatCampaignController::class, 'donatur'])->name('lihat.donatur');

    // Pencairan donasi
    Route::get('/pencairan', [RequestPencairanController::class, 'index'])->name('list.pencairan');
    Route::get('/pencairan/{RequestPencairan}/request', [RequestPencairanController::class, 'request'])->name('pencairan.request');
    Route::put('/pencairan/{RequestPencairan}', [RequestPencairanController::class, 'create'])->name('pencairan.create');
    Route::get('/pencairan/history', [RequestPencairanController::class, 'history'])->name('pencairan.history');
});

Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
});

// Rute untuk menampilkan semua sekolah
Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');
Route::get('schools/create', [SchoolController::class, 'create'])->name('schools.create');
Route::post('schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('schools/{id}/edit', [SchoolController::class, 'edit'])->name('schools.edit');
Route::put('schools/{id}', [SchoolController::class, 'update'])->name('schools.update');
Route::delete('schools/{id}', [SchoolController::class, 'destroy'])->name('schools.destroy');
Route::get('schools/{id}', [SchoolController::class, 'show'])->name('schools.show');


//test fe
Route::get('/managedonation/money/edit/id', function () {
    return view('managedonation/formeditmoney');
});



require __DIR__ . '/auth.php';
