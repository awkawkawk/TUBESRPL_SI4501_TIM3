<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('school')->get();

        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the logged-in user is an admin or school
            if ($user->tipe_user === 'sekolah') {
                return view('index', compact('campaigns'));
            }
            elseif ($user->tipe_user === 'admin') {
                return redirect(route('dashboard.admin'));
            }
        } else {
            // If the user is not logged in or logged-in user is a donator
            return view('index-donatur', compact('campaigns'));
        }

        // For donator users (logged-in or not)
        return view('index-donatur', compact('campaigns'));
    }
}
