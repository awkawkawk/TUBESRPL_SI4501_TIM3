<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        // Retrieve all campaigns and news
        $campaigns = Campaign::with('school')->get();
        $news = News::all();

        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the logged-in user is an admin
            if ($user->tipe_user === 'admin') {
                return redirect(route('dashboard.admin'));
            }
            // Check if the logged-in user is a school
            elseif ($user->tipe_user === 'sekolah') {
                // Retrieve the campaigns created by the logged-in school, ordered by creation date
                $campaignsLatest = Campaign::where('id_sekolah', $user->id)
                    ->latest()
                    ->limit(6)
                    ->get();

                // Check if there are any campaigns created by the school
                if ($campaignsLatest->isEmpty()) {
                    // If no campaigns created, display random campaigns
                    $campaignsLatest = Campaign::inRandomOrder()->limit(6)->get();
                }

                return view('index', compact('campaignsLatest', 'news', 'campaigns'));
            }
            else {
                // Retrieve the latest donation
                $latestDonation = Donation::latest()->first();

                // If there's a latest donation, display its associated campaign
                if ($latestDonation) {
                    $campaignsLatest = collect([$latestDonation->campaign]);
                } else {
                    // If no latest donation, display random campaigns
                    $campaignsLatest = Campaign::inRandomOrder()->limit(6)->get();
                }

                // Return the view with the campaigns
                return view('index-donatur', compact('campaigns', 'news', 'campaignsLatest'));
            }
        } else {
            // If the user is not logged in, display random campaigns
            $campaignsLatest = Campaign::inRandomOrder()->limit(6)->get();
            return view('index-donatur', compact('campaigns', 'news', 'campaignsLatest'));
        }
    }
}
