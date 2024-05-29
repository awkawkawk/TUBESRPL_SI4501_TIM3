<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $table = 'targets';
    protected $fillable = [
        'type',
        'money_amount',
        'goods',
        'id_campaign'
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
