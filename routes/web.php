<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');

// Route untuk menyimpan data campaign baru
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');

// Route::get('/daftar-campaigns', [CampaignController::class, 'index'])->name('daftar');

Route::get('/campaigns/riwayat', [CampaignController::class, 'index'])->name('riwayatcampaign.index');


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

Route::get('/verifikasi-sekolah', function () {
    return view('verifikasi-sekolah');
});

// test
Route::get('/donation/donasiuang', function () {
    return view('donation/donasiuang');
});

Route::get('/donation/donasiuang/pembayaran', function () {
    return view('donation/donasiuangnext');
});
