<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\Target;
use App\Models\ItemDonation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = User::where('tipe_user', 'donatur')->get();
        return view('donatur.managedonatur', compact('donaturs'));
    }

   

}
