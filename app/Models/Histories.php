<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'id_money_donation',
        'nominal',
        'status',
        'nominal_pencairan',
        'id_tahap_pencairan',
        'id_method_payment',
        'nama_pemilik',
        'nomor_rekening',
        'pendukung',
        'id_request_pencairan'
    ];

    // Definisikan relasi dengan model MoneyDonation
    public function moneyDonation()
    {
        return $this->belongsTo(MoneyDonation::class, 'id_money_donation');
    }
    public function TahapPencairan()
    {
        return $this->belongsTo(TahapPencairan::class, 'id_tahap_pencairan');
    }
    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'id_method_payment');
    }
    public function requestPencairan()
    {
        return $this->belongsTo(RequestPencairan::class, 'id_request_pencairan');
    }

}
