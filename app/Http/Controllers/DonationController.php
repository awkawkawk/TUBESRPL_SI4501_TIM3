<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class DonationController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'Sedang Berjalan')->get();
        return view('donation.index', compact('campaigns'));
    }

    public function showForm($id)
    {
        // Mengambil data campaign berdasarkan ID yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $metodePembayaran = MethodPayment::all();

        // Menampilkan view dengan data campaign yang dipilih
        return view('donation.donasiuang', compact('selectedCampaign', 'metodePembayaran'));
    }


//     public function showSummary(Request $request)
// {
//     // Validasi input form
//     $request->validate([
//         'nominal' => 'required|numeric',
//         'metode_pembayaran' => 'required',
//         'nama_pemilik' => 'required',
//         'nomor_rekening' => 'required',
//         'pesan' => 'nullable',
//         'syarat_ketentuan' => 'accepted',
//     ]);

//     // Simpan data donasi ke session
//     $request->session()->put('donation', $request->all());

//     // Ambil id_bank dari request
//     $id_bank = $request->id_bank;

//     // Ambil data bank dari MethodPayment
//     $bank = MethodPayment::findOrFail($id_bank);
//     $nama_pemilik = $bank->nama_pemilik;
//     $nomor_rekening = $bank->nomor_rekening;

//     // Ambil data lain dari request atau session
//     $nama_bank = $request->nama_bank;
//     $nomor_rekening = $request->nomor_rekening;
//     $nominal = $request->nominal;
//     $selectedCampaignId = $request->selected_campaign_id;
//     $metode_pembayaran = $request->metode_pembayaran;
//     $waktu_donasi = now(); // Tanggal dan waktu donasi saat ini

//     // Ambil data campaign yang dipilih
//     $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

//     // Kembalikan view dengan data yang diperlukan
//     return view('donation.summary')
//         ->with('nama_bank', $nama_bank)
//         ->with('nomor_rekening', $nomor_rekening)
//         ->with('nominal', $nominal)
//         ->with('selectedCampaign', $selectedCampaign)
//         ->with('metode_pembayaran', $metode_pembayaran)
//         ->with('nama_pemilik', $nama_pemilik)
//         ->with('waktu_donasi', $waktu_donasi);
// }

public function showSummary(Request $request)
{
    // Validasi input form
    $request->validate([
        'nominal' => 'required|numeric',
        'metode_pembayaran' => 'required',
        'nama_pemilik' => 'required',
        'nomor_rekening' => 'required',
        'pesan' => 'nullable',
        'syarat_dan_ketentuan' => 'accepted',
    ]);

    // Simpan data donasi ke session
    $request->session()->put('donation', $request->all());

    // Ambil data bank dari MethodPayment
    $id_bank = $request->metode_pembayaran;
    $bank = MethodPayment::findOrFail($id_bank);
    $nama_pemilik = $bank->nama_pemilik;
    $tujuan_pembayaran = $bank->metode_pembayaran;
    $nomor_rekening = $bank->nomor_rekening;

    // Ambil data lain dari request atau session
    $nama_bank = $request->nama_bank;
    $nomor_rek = $request->nomor_rekening;
    $pentransfer = $request->nama_pemilik;
    $nominal = $request->nominal;
    $selectedCampaignId = $request->id_campaign; // Perubahan di sini
    $metode_pembayaran = $request->metode_pembayaran;
    $waktu_donasi = now(); // Tanggal dan waktu donasi saat ini

    // Ambil data campaign yang dipilih
    $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

    // Kembalikan view dengan data yang diperlukan
    return view('donation.summary', compact('nama_bank','tujuan_pembayaran', 'nomor_rekening', 'nomor_rek', 'pentransfer', 'nominal', 'selectedCampaign', 'metode_pembayaran', 'nama_pemilik', 'waktu_donasi'));
}



    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            // tambahkan validasi sesuai kebutuhan
        ]);

        // Ambil data donasi dari session
        $donationData = $request->session()->get('donation');

        // Ambil nama bank dari tabel method_payments
        $methodPayment = MethodPayment::findOrFail($donationData['metode_pembayaran']);
        $namaBank = $methodPayment->metode_pembayaran; // Ganti dengan nama kolom yang sesuai

        // Simpan data donasi ke database
        $donation = Donation::create([
            'id_user' => auth()->id(),
            'id_campaign' => $donationData['id_campaign'],
            'pesan' => $donationData['pesan'],
            'syarat_ketentuan' => $request->has('syarat_ketentuan') ? true : false,
            'status' => 'Menunggu Verifikasi',
        ]);

        // Simpan data donasi uang ke database
        MoneyDonation::create([
            'id_donasi' => $donation->id,
            'id_bank' => $donationData['metode_pembayaran'],
            'nama_bank' => $namaBank,
            'nama_pemilik' => $donationData['nama_pemilik'],
            'nomor_rekening' => $donationData['nomor_rekening'],
            'nominal' => $donationData['nominal'],
        ]);

        // Hapus data donasi dari session
        $request->session()->forget('donation');

        // Redirect ke halaman index dengan pesan sukses
        return redirect('/donasi')->with('success', 'Terimakasih Donasinya Orang Baik');

    }
}
