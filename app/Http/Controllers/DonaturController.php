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
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;


class DonaturController extends Controller
{
    public function index()
    {
        $donaturs = User::where('tipe_user', 'donatur')->get();
        return view('donatur.managedonatur', compact('donaturs'));
    }

    public function edit($id)
    {

        $user = User::where('tipe_user', 'donatur')->findOrFail($id);
        return view('donatur.editdonatur', compact('user'));
       
    }

    
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());
        // dd($request->hasFile('edit-photo'));
        if ($request->hasFile('edit-photo')) {
            $image = $request->file('edit-photo');
            // dd($request);

            // Baca isi gambar dan konversi ke base64
            // dd($image);
            if ($image) {
                // Read the contents of the image file and convert it to base64
                $imageData = file_get_contents($image->path());
                $base64Image = base64_encode($imageData);
            } else {
                // Handle the case where $image is null
                echo "Image is null!";
            }

            // Buat permintaan ke Imgur API
            $response = Http::withHeaders([
                'Authorization' => 'Client-ID c2fe122c365bf4a',
            ])
                ->timeout(32400)
                ->post('https://api.imgur.com/3/image', [
                    'image' => $base64Image,
                ]);

            // Periksa apakah request berhasil
        if ($response->successful()) {
            // Ambil respons JSON
            $responseData = $response->json();

            // Ambil URL gambar yang diunggah
            $imageUrl = $responseData['data']['link'];

            // Dapatkan pengguna yang ingin diperbarui
            $user = auth()->user(); // Asumsikan pengguna yang sedang login ingin diperbarui

            // Periksa apakah pengguna ditemukan
            if ($user) {
                // Perbarui kolom profile_picture
                $user->update(['profile_picture' => $imageUrl]);

                // Pesan sukses atau redirect
                return back()->with('success', 'Profile picture updated successfully!');
            } else {
                // Tangani jika pengguna tidak ditemukan
                return back()->with('error', 'User not found.');
            }
        } else {
            // Tangani kesalahan request ke Imgur API
            return back()->with('error', 'Failed to upload image to Imgur.');
        }
    }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Update the user model with the validated data
        $user->nama = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        // Save the updated user model
        $user->save();

        // $request->user()->save();
        // dd($request->user());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
   

}
