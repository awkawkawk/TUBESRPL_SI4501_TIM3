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

class DonationItemController extends Controller
{
    public function showFormItem($id)
    {
        // Mengambil data campaign berdasarkan ID yang dipilih
        $selectedCampaign = Campaign::findOrFail($id);
        $namaSekolah = $selectedCampaign->school->nama_sekolah;
        $targetDonasi = Target::where('id_campaign', $id)->where('nama_barang', '!=', 'Uang')->get();

        // Menampilkan view dengan data campaign yang dipilih
        return view('donation.donasibarang', compact('selectedCampaign', 'targetDonasi'));
    }


    public function showSummaryItem(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_barang' => 'required|array',
            'jumlah_barang' => 'required|array',
            'jasa_kirim' => 'nullable|string',
            'nomor_resi' => 'nullable|string',
            'pesan' => 'nullable|string',
            'syarat_dan_ketentuan' => 'required|accepted',
        ]);

        // Ambil data dari request
        $selectedCampaignId = $request->id_campaign;
        $waktu_donasi = now(); // Tanggal dan waktu donasi saat ini

        // Ambil data campaign yang dipilih
        $selectedCampaign = Campaign::findOrFail($selectedCampaignId);

        // Simpan data donasi ke session
        $request->session()->put('item.nama_barang', $request->nama_barang);
        $request->session()->put('item.jumlah_barang', $request->jumlah_barang);
        $request->session()->put('item.jasa_kirim', $request->jasa_kirim);
        $request->session()->put('item.nomor_resi', $request->nomor_resi);
        $request->session()->put('item.pesan', $request->pesan);

        // Kembalikan view dengan data yang diperlukan
        return view('donation.summaryItems', compact('selectedCampaign', 'waktu_donasi'));
    }



    public function storeItems(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|array',
            'jumlah_barang' => 'required|numeric|min:1',
            'jasa_kirim' => 'nullable|string',
            'nomor_resi' => 'nullable|string',
            'pesan' => 'nullable|string',
            'syarat_dan_ketentuan' => 'required|accepted',
        ]);

        // Simpan data donasi ke tabel Donasi
        $donasi = new Donasi();
        $donasi->id_user = auth()->id();
        $donasi->id_campaign = $request->id_campaign;
        $donasi->pesan = $request->pesan;
        $donasi->syarat_ketentuan = $request->has('syarat_dan_ketentuan') ? true : false;
        $donasi->status = 'Menunggu Verifikasi';
        $donasi->jasa_kirim = $request->nama;
        $donasi->nomor_resi = $request->nomor_resi;
        $donasi->save();

        // Simpan data barang donasi ke tabel ItemDonasi
        foreach ($request->metode_pembayaran as $index => $barang_id) {
            $itemDonasi = new ItemDonasi();
            $itemDonasi->id_donasi = $donasi->id; // Ambil ID donasi yang baru saja dibuat
            $itemDonasi->nama_barang = Target::findOrFail($barang_id)->nama_barang; // Ambil nama barang dari tabel Target
            $itemDonasi->jumlah_barang = $request->nominal[$index];
            $itemDonasi->save();
        }

        // Redirect atau kirim response sesuai kebutuhan
        return redirect('/donation')->with('success', 'Terimakasih Donasinya Orang Baik');
    }
}
