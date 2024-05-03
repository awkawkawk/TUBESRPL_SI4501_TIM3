<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredSchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatCampaignController;

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

// Route::get('/riwayat', function () {
//     return view('riwayatcampaign');
// });

Route::get('/buatcampaign', function () {
    return view('buatcampaign');
});


Route::get('/riwayat/donatur', function () {
    return view('lihatdonatur');
});



// test
Route::get('/donasi/donasiuang', function () {
    return view('donation/donasiuang');
});

Route::get('/donasi/donasiuang/pembayaran', function () {
    return view('donation/donasiuangnext');
});

Route::get('/donasi/donasibarang', function () {
    return view('donation/donasibarang');
});

Route::get('/campaigns/riwayat', function () {
    return view('riwayatcampaign');
});

Route::get('/verifikasi-sekolah', [App\Http\Controllers\SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');


//test
Route::get('/campaign/riwayat', [RiwayatCampaignController::class, 'index']);

