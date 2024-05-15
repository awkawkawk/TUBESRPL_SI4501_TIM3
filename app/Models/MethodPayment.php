<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodPayment extends Model
{
    use HasFactory;

    protected $table = 'method_payments';

    protected $fillable = [
        'metode_pembayaran',
        'nomor_rekening',
        'nama_pemilik',
    ];
}
