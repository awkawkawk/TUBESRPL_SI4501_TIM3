<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolVerificationController;
use App\Http\Controllers\CampaignVerificationController;
use App\Http\Controllers\Auth\RegisteredSchoolController;

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/home', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/riwayat', function () {
    return view('riwayatcampaign');
});

Route::get('/riwayat/donatur', function () {
    return view('lihatdonatur');
});

Route::get('/verifikasi-sekolah', [SchoolVerificationController::class, 'showVerificationPage'])->name('verifikasi.sekolah');

Route::get('/verifikasi-campaign', [CampaignVerificationController::class, 'showVerificationPage'])->name('verifikasi.campaign');

Route::post('/verifikasi-campaign/{id}', [CampaignVerificationController::class, 'respondVerification'])->name('response.verification.campaign');

Route::get('/search', [SearchController::class, 'search'])->name('search.result');
