<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('school')->get();
        // Pass the campaigns to the view
        return view('index', compact('campaigns'));
    }
}
