<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredSchoolController;
>>>>>>> 27ab42580768b8b39179df09a90587611d76073f
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
<<<<<<< HEAD
    return view('buatcampaigns');
});

Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');

Route::get('/campaigns', [CampaignController::class, 'index']);
=======
    return view('index');
})->name('index');
>>>>>>> 27ab42580768b8b39179df09a90587611d76073f




<<<<<<< HEAD
=======
Route::get('/riwayat', function () {
    return view('riwayatcampaign');
});

Route::get('/riwayat/donatur', function () {
    return view('lihatdonatur');
});

Route::get('/verifikasi-sekolah', [RegisteredSchoolController::class, 'showVerificationPage'])->name('verifikasi.sekolah');
>>>>>>> 27ab42580768b8b39179df09a90587611d76073f
