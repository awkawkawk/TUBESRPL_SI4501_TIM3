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
use App\Models\RequestPencairan;



class DonationController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'valid')->get();
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
        $donationData = $request->session()->get('donation');

        $methodPayment = MethodPayment::findOrFail($donationData['metode_pembayaran']);
        $namaBank = $methodPayment->metode_pembayaran;


        $donation = Donation::create([
            'id_user' => auth()->id(),
            'id_campaign' => $donationData['id_campaign'],
            'pesan' => $donationData['pesan'],
            'syarat_ketentuan' => $request->has('syarat_ketentuan') ? true : false,
            'status' => 'pending',
            'jenis_donasi' => 'uang',
        ]);

        $moneyDonation = MoneyDonation::create([
            'id_donasi' => $donation->id,
            'id_bank' => $donationData['metode_pembayaran'],
            'nama_bank' => $namaBank,
            'nama_pemilik' => $donationData['nama_pemilik'],
            'nomor_rekening' => $donationData['nomor_rekening'],
            'nominal' => $donationData['nominal'],
            'status' => 'pending',
        ]);

        $idCampaign = $moneyDonation->donation->id_campaign;

        $existingRequestPencairan = RequestPencairan::whereHas('moneyDonation.donation', function ($query) use ($idCampaign) {
            $query->where('id_campaign', $idCampaign);
        })->first();

        if ($existingRequestPencairan) {
            $existingRequestPencairan->nominal_terkumpul += $donationData['nominal'];
            $existingRequestPencairan->save();
        } else {
            RequestPencairan::create([
                'id_money_donation' => $moneyDonation->id,
                'nominal_terkumpul' => $donationData['nominal'],
                'nominal_sisa' => 0,
                'status' => 'Pending',
            ]);
        }


        $request->session()->forget('donation');


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
        $formdonation = Donation::findOrFail($request->id_donasi);

        $request->session()->put('campaign_id', $selectedCampaignId);
        $request->session()->put('donation_id', $request->id_donasi);
        $request->session()->put('formdonation', $formdonation->id);

        return view('managedonation.summarymoney', compact('nama_bank','tujuan_pembayaran', 'nomor_rekening', 'nomor_rek', 'pentransfer', 'nominal', 'selectedCampaign', 'metode_pembayaran', 'nama_pemilik', 'waktu_donasi'));
    }



    public function update(Request $request, $id)
    {
        $donationData = $request->session()->get('donation');
        $campaignId = $request->session()->get('campaign_id');
        $donationId = $request->session()->get('donation_id');
        $formdonationId = $request->session()->get('formdonation');

        $donation = Donation::findOrFail($donationId);

        $donation->update([
            'pesan' => $donationData['pesan'],
        ]);

        $moneyDonation = MoneyDonation::where('id_donasi', $donation->id)->first();

        $methodPayment = MethodPayment::findOrFail($donationData['metode_pembayaran']);
        $namaBank = $methodPayment->metode_pembayaran;

        $moneyDonation->update([
            'id_bank' => $donationData['metode_pembayaran'],
            'nama_bank' => $namaBank,
            'nama_pemilik' => $donationData['nama_pemilik'],
            'nomor_rekening' => $donationData['nomor_rekening'],
            'nominal' => $donationData['nominal'],
        ]);

        return redirect()->route('donationMoney.edit'); // Ganti dengan rute tujuan setelah update
    }

    public function destroy($id)
    {

        $donation = Donation::findOrFail($id);

        MoneyDonation::where('id_donasi', $id)->delete();

        $donation->delete();

        return redirect()->route('donationMoney.edit', ['id' => $id])->with('success', 'Donasi berhasil dihapus');
    }


}
