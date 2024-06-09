<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportingProofController extends Controller
{
    public function index(){
        $campaigns = Campaign::all();
        return view('reporting-proof', compact('campaigns'));
    }
}
