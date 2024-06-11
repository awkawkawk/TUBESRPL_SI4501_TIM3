<?php

namespace App\Models;

use App\Models\User;
use App\Models\Campaign;
use App\Models\ItemDonation;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donations';

    protected $fillable = [
        'id_user',
        'id_campaign',
        'pesan',
        'syarat_ketentuan',
        'status',
        'jasa_kirim',
        'nomor_resi',
        'jenis_donasi',
    ];

    // Definisikan relasi dengan model Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'id_campaign');
    }

    // Definisikan relasi dengan model User
    public function user()
    {
    return $this->belongsTo(User::class, 'id_user');
    }

    // Definisikan relasi dengan model MethodPayment
    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'rekening');
    }

    public function donationItems()
    {
        return $this->hasMany(ItemDonation::class, 'id_donasi');
    }

    public function donationMoney()
    {
        return $this->hasMany(MoneyDonation::class, 'id_donasi');
    }

    public function moneyDonations()
    {
        return $this->hasMany(MoneyDonation::class, 'id_donasi');
    }
}
