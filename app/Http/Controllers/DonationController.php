<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\Target;
use App\Models\ItemDonation;
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
        return redirect('/donation')->with('success', 'Terimakasih Donasinya Orang Baik');

    }

    //
    public function editMoney()
    {
        $donation = Donation::with(['user', 'moneyDonations', 'donationItems'])->get();
        return view('managedonation.editmoney', compact('donation'));
    }

    public function showform_editMoney($id)
    {
        $formdonation = Donation::with(['user', 'moneyDonations', 'donationItems'])->findOrFail($id);
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $metodePembayaran = MethodPayment::all();
        return view('managedonation.formeditmoney', compact('formdonation', 'selectedCampaign', 'namaSekolah', 'metodePembayaran'));
    }

    public function showSummaryEdit(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nominal' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'nama_pemilik' => 'required',
            'nomor_rekening' => 'required',
            'pesan' => 'nullable',
        ]);

        $request->session()->put('donation', $request->all());


        $id_bank = $request->metode_pembayaran;
        $bank = MethodPayment::findOrFail($id_bank);
        $nama_pemilik = $bank->nama_pemilik;
        $tujuan_pembayaran = $bank->metode_pembayaran;
        $nomor_rekening = $bank->nomor_rekening;


        $nama_bank = $request->nama_bank;
        $nomor_rek = $request->nomor_rekening;
        $pentransfer = $request->nama_pemilik;
        $nominal = $request->nominal;
        $selectedCampaignId = $request->id_campaign;
        $metode_pembayaran = $request->metode_pembayaran;
        $waktu_donasi = now();


        $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

        // $id_donasi = $request->id_donasi;
        // $donation = Donation::findOrFail($id_donasi);

        return view('managedonation.summarymoney', compact('nama_bank','tujuan_pembayaran', 'nomor_rekening', 'nomor_rek', 'pentransfer', 'nominal', 'selectedCampaign', 'metode_pembayaran', 'nama_pemilik', 'waktu_donasi', ));
    }



    // public function update(Request $request, $id)
    // {
    //     // Ambil data donasi dari session
    //     $donationData = $request->session()->get('donation');

    //     // Ambil data donasi yang akan diupdate
    //     $donation = Donation::findOrFail($id);

    //     // Update data donasi
    //     $donation->update([
    //         'pesan' => $donationData['pesan'],
    //     ]);

    //     // Ambil data donasi uang yang akan diupdate
    //     $moneyDonation = MoneyDonation::where('id_donasi', $donation->id)->first();

    //     // Update data donasi uang
    //     $moneyDonation->update([
    //         'id_bank' => $donationData['metode_pembayaran'],
    //         'nama_bank' => $methodPayment->metode_pembayaran, // Ganti dengan nama kolom yang sesuai
    //         'nama_pemilik' => $donationData['nama_pemilik'],
    //         'nomor_rekening' => $donationData['nomor_rekening'],
    //         'nominal' => $donationData['nominal'],
    //     ]);

    //     // Hapus data donasi dari session
    //     $request->session()->forget('donation');

    //     // Redirect ke halaman index dengan pesan sukses
    //     return redirect('/edit/donation/money')->with('success', 'Data Donasi Berhasil Diupdate');
    // }

    public function update(Request $request, $id)
{
    // Validasi input form

    // Ambil data donasi dari session
    $donationData = $request->session()->get('donation');

    // Ambil data donasi yang akan diupdate
    // $id_donasi = $request->id_donasi;
    $donation = Donation::findOrFail($id);

    // Update data donasi
    $donation->update([
        'pesan' => $donationData['pesan'],
    ]);

    // Ambil data donasi uang yang akan diupdate
    $moneyDonation = MoneyDonation::where('id_donasi', $donation->id)->first();

    // Update data donasi uang
    $moneyDonation->update([
        'id_bank' => $donationData['metode_pembayaran'],
        'nama_bank' => $donationData['tujuan_pembayaran'],
        'nama_pemilik' => $donationData['nama_pemilik'],
        'nomor_rekening' => $donationData['nomor_rekening'],
        'nominal' => $donationData['nominal'],
    ]);

    // Hapus data donasi dari session
    $request->session()->forget('donation');

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('donations.index')->with('success', 'Data Donasi Berhasil Diupdate');
}



    //edit item donation
    public function editItem()
    {
        $donation = Donation::with(['user', 'moneyDonations', 'donationItems'])->get();
        return view('managedonation.edititem', compact('donation'));
    }










}
