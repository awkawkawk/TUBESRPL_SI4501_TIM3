<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\TahapPencairan;
use App\Models\RequestPencairan;
use App\Models\Histories;
use Illuminate\Support\Facades\Auth;

class RequestPencairanController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $school = $user->school;

        $request = RequestPencairan::whereHas('moneyDonation.donation.campaign', function ($query) use ($school) {
            $query->where('id_sekolah', $school->id);
        })->get();
    return view('pencairan.index', compact('request', 'school'));}


    public function request(RequestPencairan $RequestPencairan)
    {
        $totalNominal = $RequestPencairan->nominal_terkumpul;
        $sisanominal = $RequestPencairan->nominal_sisa;
        $tahap1 = $totalNominal * 0.3;
        $tahap2 = $totalNominal * 0.4;
        $tahap3 = $totalNominal * 0.3;

        // if ($sisanominal == 0) {
        //     $tahap3 = $totalNominal;
        // } else {
        //     $tahap3 = $sisanominal;
        // }

        $options = [];

        $methodPayment = MethodPayment::all();

        if ($totalNominal == 0) {
            $options['Nominal donasi tidak mencukupi'] = 0;
        } else {
            $options['Tahap 1'] = $tahap1;
            $options['Tahap 2'] = $tahap2;
            $options['Tahap 3'] = $tahap3;
        }

        return view('pencairan.create', compact('RequestPencairan', 'options', 'methodPayment'));
    }


        public function create(Request $request, $id)
    {
        $requestPencairan = RequestPencairan::findOrFail($id);

        $selectedTahap = $request->input('tahap');

        $tahapPencairan = TahapPencairan::where('name', $selectedTahap)->first();

        if (!$tahapPencairan) {
            return redirect()->back()->with('error', 'Tahap pencairan tidak valid.');
        }

        $totalNominal = $requestPencairan->nominal_terkumpul;
        $sisanominal = $requestPencairan->nominal_sisa;
        $tahap1 = $totalNominal * 0.3;
        $tahap2 = $totalNominal * 0.4;
        $tahap3 = $totalNominal * 0.3;

        switch ($selectedTahap) {
            case 'Tahap 1':
                $requestPencairan->nominal_sisa = $totalNominal - $tahap1;
                break;
            case 'Tahap 2':
                $requestPencairan->nominal_sisa = $totalNominal - $tahap2 - $tahap1;
                break;
            case 'Tahap 3':
                $requestPencairan->nominal_sisa = $totalNominal - $tahap3 - $tahap2 - $tahap3;
                break;
            default:
                return redirect()->back()->with('error', 'Pilihan tahap tidak valid.');
        }

        $requestPencairan->status = 'Pending';
        $requestPencairan->id_tahap_pencairan = $tahapPencairan->id;


        if ($request->hasFile('pendukung')) {
            $pendukung = $request->file('pendukung');
            $filename = time() . '.' . $pendukung->getClientOriginalExtension();
            $pendukung->storeAs('public/cover_images', $filename);
            $requestPencairan->pendukung = $filename;
        }

        $requestPencairan->nama_pemilik = $request->input('nama_pemilik');
        $requestPencairan->nomor_rekening = $request->input('nomor_rekening');
        $requestPencairan->id_method_payment = $request->metode_pembayaran;


        $history = new Histories();
        $historyTahap = $request->input('tahap');

                switch ($historyTahap) {
                    case 'Tahap 1':
                        $history->nominal_pencairan = $tahap1;
                        break;
                    case 'Tahap 2':
                        $history->nominal_pencairan =  $tahap2;
                        break;
                    case 'Tahap 3':
                        $history->nominal_pencairan = $tahap3;
                        break;
                    default:
                        return redirect()->back()->with('error', 'Pilihan tahap tidak valid.');
                }
        $history->id_tahap_pencairan = $tahapPencairan->id;
        $history->status = 'Pending';
        $history->id_method_payment = $request->metode_pembayaran;
        $history->nama_pemilik = $request->input('nama_pemilik');
        $history->nomor_rekening = $request->input('nomor_rekening');
        if ($request->hasFile('pendukung')) {
            $pendukung = $request->file('pendukung');
            $filename = time() . '.' . $pendukung->getClientOriginalExtension();
            $pendukung->storeAs('public/cover_images', $filename);
            $history->pendukung = $filename;
        }
        $history->id_money_donation = $requestPencairan->id_money_donation;
        $history->id_request_pencairan = $requestPencairan->id;
        $history->save();
        $requestPencairan->save();

        return redirect()->route('list.pencairan')->with('success', 'Permintaan pencairan berhasil diperbarui.');
    }





     public function history()
    {

       $donasi = Histories::all();


       return view('pencairan.history', compact('donasi'));
    }

}
