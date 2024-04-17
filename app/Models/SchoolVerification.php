<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolVerification extends Model
{
    use HasFactory;
    protected $table = 'school_verifications';
    protected $fillable = [
        'schoolLogo',
        'schoolName',
        'schoolAddress',
        'schoolEmail',
        'schoolPhone',
        'username',
        'password',
        'registrantName',
        'registrantEmail',
        'registrantNumber',
        'registrantIdentityNumber',
        'registrantProof'
    ];
}
