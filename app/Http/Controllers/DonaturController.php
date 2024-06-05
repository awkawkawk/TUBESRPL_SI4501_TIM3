<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Donation;
// use App\Models\Campaign;
// use App\Models\User;
// use App\Models\MethodPayment;
// use App\Models\MoneyDonation;
// use App\Models\Target;
// use App\Models\ItemDonation;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\DB;
// use App\Http\Requests\UpdateDonaturRequest;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\View\View;
// use Illuminate\Support\Facades\Http;



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateDonaturRequest; 

class DonaturController extends Controller
{
    public function index()
{
    // menyesuaikan dengan logika untuk menampilkan data donatur
    $donaturs = User::where('tipe_user', 'donatur')->get();
    return view('donatur.managedonatur', compact('donaturs'));

}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('donatur.editdonatur', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->nama = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->tipe_user = $request->input('peran'); 

        $user->save();

        return redirect()->route('donatur.editdonatur', ['id' => $user->id]);
    }

    
}
