<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class ProfileController extends Controller
{
    

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->hasFile('edit-photo')) {
            $image = $request->file('edit-photo');
            if ($image) {
                // Read the contents of the image file and convert it to base64
                $imageData = file_get_contents($image->path());
                $base64Image = base64_encode($imageData);

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
            } else {
                // Tangani kasus ketika $image null
                return back()->with('error', 'Image is null!');
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

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
