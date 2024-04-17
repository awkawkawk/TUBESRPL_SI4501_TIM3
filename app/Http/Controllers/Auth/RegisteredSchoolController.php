<?php

namespace App\Http\Controllers;

use App\Models\SchoolVerification;
use Illuminate\Http\Request;

class RegisteredSchoolController extends Controller
{
    public function create(): View
    {
        return view('auth.register-school');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
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
