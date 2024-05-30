<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyDonation extends Model
{
    protected $fillable = [
        'id_donasi',
        'id_bank',
        'nama_bank',
        'nama_pemilik',
        'nomor_rekening',
        'nominal',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'id_donasi');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }







}
