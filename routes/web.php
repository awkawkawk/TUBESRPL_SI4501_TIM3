<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/riwayat', function () {
    return view('riwayatcampaign');
});
