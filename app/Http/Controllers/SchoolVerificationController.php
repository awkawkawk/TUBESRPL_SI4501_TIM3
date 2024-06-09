<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\School;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Cloudinary\Configuration\Configuration;
use Illuminate\Validation\ValidationException;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SchoolVerificationController extends Controller
{
    public function index(): View
    {
        $page = 1;
        return view('auth.register-school', compact('page'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'alamat_sekolah' => ['required', 'string', 'max:255'],
            'no_telepon_sekolah' => ['required', 'string', 'max:15', 'min:11', 'unique:schools'],
            'email_sekolah' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:schools'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'logo_sekolah' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'nama_pendaftar' => ['required', 'string', 'max:255'],
            'no_hp_pendaftar' => ['required', 'string', 'max:15', 'min:11', 'unique:schools'],
            'email_pendaftar' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:schools'],
            'identitas_pendaftar' => ['required', 'string', 'max:255'],
            'bukti_id_pendaftar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Konfigurasi Cloudinary
        // Configuration::instance([
        //     'cloud' => [
        //         'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        //         'api_key' => env('CLOUDINARY_API_KEY'),
        //         'api_secret' => env('CLOUDINARY_API_SECRET'),
        //     ],
        //     'url' => [
        //         'secure' => true,
        //     ],
        // ]);

        $schoolData = [
            'nama_sekolah' => $validatedData['nama_sekolah'],
            'alamat_sekolah' => $validatedData['alamat_sekolah'],
            'no_telepon_sekolah' => $validatedData['no_telepon_sekolah'],
            'email_sekolah' => $validatedData['email_sekolah'],
            'nama_pendaftar' => $validatedData['nama_pendaftar'],
            'no_hp_pendaftar' => $validatedData['no_hp_pendaftar'],
            'email_pendaftar' => $validatedData['email_pendaftar'],
            'identitas_pendaftar' => $validatedData['identitas_pendaftar'],
            'bukti_id_pendaftar' => $validatedData['bukti_id_pendaftar'],
            'status' => 'perlu diverifikasi',
        ];

        // Ambil gambar dari form request
        if ($request->hasFile('logo_sekolah')) {
            $image = $request->file('logo_sekolah')->getRealPath();

            // Unggah gambar ke Cloudinary ke dalam folder 'logo_sekolah'
            $uploadResult = cloudinary()->upload($image, [
                'folder' => 'logo_sekolah',
            ])->getSecurePath();

            // Ambil URL gambar yang diunggah
            // $imageUrl = $uploadResult['secure_url'];

            // Tambahkan URL gambar ke dalam array data sekolah
            $schoolData['logo_sekolah'] = $uploadResult;
        }

        if ($request->hasFile('bukti_id_pendaftar')) {
            $file = $request->file('bukti_id_pendaftar')->getRealPath();

            // Unggah file ke Cloudinary ke dalam folder 'bukti'
            $uploadResult = cloudinary()
                ->upload($file, [
                    'folder' => 'bukti',
                ])
                ->getSecurePath();

            // Ambil URL file yang diunggah
            // $fileUrl = $uploadResult['secure_url'];

            // Tambahkan URL file ke dalam array data sekolah
            $schoolData['bukti_id_pendaftar'] = $uploadResult;
        }

        // Jika validasi berhasil, simpan data sekolah ke dalam database
        $schoolVerification = school::create($schoolData);

        $user = User::create([
            'nama' => $validatedData['nama_sekolah'],
            'email' => $validatedData['email_sekolah'],
            'profile_picture' => $schoolData['logo_sekolah'],
            'password' => Hash::make($validatedData['password']), // Menggunakan Hash untuk menyimpan password terenkripsi
            'phone' => $validatedData['no_telepon_sekolah'],
            'tipe_user' => 'sekolah', // atau tipe user lain yang sesuai
            'id_sekolah' => $schoolVerification->id,
        ]);

        return redirect('/')->with('success', 'Registrasi sekolah berhasil. Silahkan tunggu verifikasi dari admin :)');
    }

    public function showVerificationPage()
    {
        $schools = school::where('status', 'pending')->get();
        return view('verifikasi-sekolah', compact('schools'));
    }

    public function respondVerification(Request $request, $id)
    {
        $schoolVerification = school::findOrFail($id);

        if ($request->input('response') == 'confirm') {
            $schoolVerification->update(['status' => 'valid']);
        } elseif ($request->input('response') == 'decline') {
            // Ambil nomor pendaftar dari request
            $nomorPendaftar = $schoolVerification->no_hp_pendaftar;

            // Ambil pesan catatan dari request
            $pesan = $request->input('catatan');

            // Buat link WhatsApp dengan nomor penerima dan pesan
            $url = "https://wa.me/$nomorPendaftar?text=" . urlencode("Maaf, pendaftaran Anda ditolak karena: ");
            $schoolVerification->update(['status' => 'ditolak']);
            return redirect()->away($url);
        }

        return redirect()->back()->with('success', 'Respon berhasil disimpan');
    }
}
