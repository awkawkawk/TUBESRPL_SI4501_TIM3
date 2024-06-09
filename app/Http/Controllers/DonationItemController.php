<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\ItemDonation;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DonationItemController extends Controller
{
    public function showFormItem($id)
    {
        // Mengambil data campaign berdasarkan ID yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $targetDonasi = Target::where('id_campaign', $id)->where('nama_barang', '!=', 'Uang')->get();

        return view('donation.donasibarang', compact('selectedCampaign','targetDonasi','id'));
    }

    public function postFormItem(Request $request, $id){
        // Validasi input form
        $request->validate([
            'nama_barang' => 'required|array',
            'jumlah_barang' => 'required|array',
            'jasa_kirim' => 'nullable|string',
            'nomor_resi' => 'nullable|string',
            'pesan' => 'nullable|string',
            'syarat_dan_ketentuan' => 'required|accepted',
        ]);

        $waktu_donasi = now(); // Tanggal dan waktu donasi saat ini

        // Ambil data campaign yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;

        // Simpan data donasi ke session
        $request->session()->put('item.nama_barang', $request->nama_barang);
        $request->session()->put('item.jumlah_barang', $request->jumlah_barang);
        $request->session()->put('item.jasa_kirim', $request->jasa_kirim);
        $request->session()->put('item.nomor_resi', $request->nomor_resi);
        $request->session()->put('item.pesan', $request->pesan);
        $request->session()->put('item.waktu_donasi', $waktu_donasi);
        $request->session()->put('item.id_campaign', $id);


        // Menampilkan view dengan data campaign yang dipilih
        return view('donation.summaryItems', compact('selectedCampaign', 'namaSekolah', 'waktu_donasi'));
    }


    public function storeItems(Request $request)
    {

        $donationData = $request->session()->get('item');

        // Simpan data donasi ke tabel Donasi
        $donation = Donation::create([
            'id_user' => auth()->id(),
            'id_campaign' => $donationData['id_campaign'],
            'pesan' => $donationData['pesan'],
            'syarat_ketentuan' => $request->has('syarat_ketentuan') ? true : false,
            'status' => 'pending',
            'jasa_kirim' => $donationData['jasa_kirim'],
            'nomor_resi' => $donationData['nomor_resi'],
            'jenis_donasi' => 'barang',
        ]);

        // Simpan data barang donasi ke tabel ItemDonasi
        foreach ($donationData['nama_barang'] as $index => $namaBarang) {
            ItemDonation::create([
                'id_donasi' => $donation->id,
                'nama_barang' => $namaBarang,
                'jumlah_barang' => $donationData['jumlah_barang'][$index],
                'status' => 'dikirim',
            ]);
        }

        // Hapus data donasi dari session
        $request->session()->forget('donation');

        // Redirect atau kirim response sesuai kebutuhan
        return redirect('/donation')->with('success', 'Terimakasih Donasinya Orang Baik');
    }

    //edit item
    public function editItem()
    {
        $donation = Donation::with(['user', 'moneyDonations', 'donationItems'])->get();
        return view('managedonation.edititem', compact('donation'));
    }

    public function showform_editItem($id)
    {
        $formdonation = Donation::with(['user', 'moneyDonations', 'donationItems'])->findOrFail($id);
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $targetDonasi = Target::where('id_campaign', $formdonation->id_campaign)->where('nama_barang', '!=', 'Uang')->get();
        return view('managedonation.formedititem', compact('formdonation', 'selectedCampaign', 'namaSekolah', 'targetDonasi'));
    }

    public function updateItem(Request $request, $id)
    {

    Log::info('updateItem method called');
    $request->validate([
        'nama_barang.*' => 'required',
        'jumlah_barang.*' => 'required|numeric',
        'jasa_kirim' => 'nullable|required',
        'nomor_resi' => 'nullable|required',
        'pesan' => 'nullable',
    ]);

    $formdonation = Donation::findOrFail($id);
    $formdonation->jasa_kirim = $request->jasa_kirim;
    $formdonation->nomor_resi = $request->nomor_resi;
    $formdonation->pesan = $request->pesan;
    $formdonation->save();

    // Hapus item donasi lama
    $formdonation->donationItems()->delete();

    // Buat item donasi baru
    for ($i = 0; $i < count($request->nama_barang); $i++) {
        $donationItem = new ItemDonation();
        $donationItem->id_donasi = $formdonation->id;
        $donationItem->nama_barang = $request->nama_barang[$i];
        $donationItem->jumlah_barang = $request->jumlah_barang[$i];
        $donationItem->save();
    }

    $selectedCampaignId = $request->id_campaign;
    $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

    return redirect()->route('donationItem.edit');

    // return redirect()->route('donationItem.edit')->with('success', 'Donasi berhasil di edit');
    // return view('managedonation.edititem');
    return redirect('/edit/donation/item');
    }


    public function destroy($id)
    {

        $donation = Donation::findOrFail($id);

        ItemDonation::where('id_donasi', $id)->delete();

        $donation->delete();

        return redirect()->route('donationItem.edit', ['id' => $id])->with('success', 'Donasi berhasil dihapus');
    }


}
