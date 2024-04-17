<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SchoolVerification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredSchoolController extends Controller
{
    public function index(): View
    {
        return view('auth.register-school');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolVerification $schoolVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolVerification $schoolVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolVerification $schoolVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolVerification $schoolVerification)
    {
        //
    }
}

