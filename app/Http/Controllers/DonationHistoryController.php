<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationHistoryController extends Controller
{
    public function index()
    {
        $histories = Donation::with('user', 'campaign')->get();
        return view('riwayatdonasi', compact('histories'));
    }
}

