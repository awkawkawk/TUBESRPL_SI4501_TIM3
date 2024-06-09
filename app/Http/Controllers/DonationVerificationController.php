<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\RequestPencairan;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DonationVerificationController extends Controller
{
    public function showVerificationPage()
    {
        $donations = Donation::with('user', 'campaign', 'donationItems', 'donationMoney')->where('status', 'pending')->get();

        // $donations->each(function ($donation) {
        //     $groupedDonationItems = $donation->donationItems->groupBy('nama_barang')->map(function ($items, $nama_barang) {
        //         return [
        //             'nama_barang' => $nama_barang,
        //             'jumlah_barang' => $items->sum('jumlah_barang'),
        //         ];
        //     });

        //     $donation->groupedDonationItems = $groupedDonationItems->isEmpty() ? collect() : $groupedDonationItems;

        //     $totalDonationMoney = $donation->donationMoney->sum('nominal');
        //     $donation->totalDonationMoney = $totalDonationMoney;
        // dd($donation);
        // });

        return view('verifikasi-donasi', compact('donations'));
    }

    public function respondVerification(Request $request, $id)
    {
        $donationVerification = Donation::findOrFail($id);
        if ($request->input('response') === 'confirm') {
            $donationVerification->update(['status' => 'valid']);
            // dd($donationVerification->moneyDonations->first());
            $idCampaign = $donationVerification->id_campaign;

            $moneyDonation = $donationVerification->moneyDonations->first(); // Ambil donasi uang pertama saja

            if ($moneyDonation) {
                $nominal = $moneyDonation->nominal;

                $existingRequestPencairan = RequestPencairan::whereHas('moneyDonation.donation', function ($query) use ($idCampaign) {
                    $query->where('id_campaign', $idCampaign);
                })->first();

                if ($existingRequestPencairan) {
                    $existingRequestPencairan->nominal_terkumpul += $nominal;
                    $existingRequestPencairan->nominal_sisa += $nominal;
                    $existingRequestPencairan->save();
                } else {
                    RequestPencairan::create([
                        'id_money_donation' => $moneyDonation->id,
                        'nominal_terkumpul' => $nominal,
                        'nominal_sisa' => $nominal,
                        'status' => 'pending',
                    ]);
                }
            }
        } elseif ($request->input('response') === 'decline') {
            $donationVerification->update(['status' => 'ditolak']);
        }

        return redirect()->back()->with('success', 'Respon berhasil disimpan');
    }
}
