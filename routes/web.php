<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredSchoolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
