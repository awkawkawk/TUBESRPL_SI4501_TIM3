<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaigns';
    protected $fillable = ['id_sekolah', 'nama_campaign', 'deskripsi_campaign', 'status', 'catatan_campaign', 'tanggal_dibuat', 'tanggal_selesai'];
}
