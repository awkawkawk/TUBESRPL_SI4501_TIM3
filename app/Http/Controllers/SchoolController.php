<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo_sekolah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'nama_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string|max:255',
            'no_telepon_sekolah' => 'required|string|max:15',
            'email_sekolah' => 'required|email|max:255',
            'nama_pendaftar' => 'required|string|max:255',
            'no_hp_pendaftar' => 'required|string|max:15',
            'email_pendaftar' => 'required|email|max:255',
            'identitas_pendaftar' => 'required|string|max:255',
            'bukti_id_pendaftar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo_sekolah')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('logo_sekolah')->getRealPath(), [
                'folder' => 'logo_sekolah'
            ])->getSecurePath();
            $data['logo_sekolah'] = $uploadedFileUrl;
        }
        if ($request->hasFile('bukti_id_pendaftar')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('bukti_id_pendaftar')->getRealPath(), [
                'folder' => 'bukti'
            ])->getSecurePath();
            $data['bukti_id_pendaftar'] = $uploadedFileUrl;
        }

        School::create($data);

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);

        $request->validate([
            'logo_sekolah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'nama_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string|max:255',
            'no_telepon_sekolah' => 'required|string|max:15',
            'email_sekolah' => 'required|email|max:255',
            'nama_pendaftar' => 'required|string|max:255',
            'no_hp_pendaftar' => 'required|string|max:15',
            'email_pendaftar' => 'required|email|max:255',
            'identitas_pendaftar' => 'required|string|max:255',
            'bukti_id_pendaftar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo_sekolah')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('logo_sekolah')->getRealPath(), [
                'folder' => 'logo_sekolah'
            ])->getSecurePath();
            $data['logo_sekolah'] = $uploadedFileUrl;
        }
        if ($request->hasFile('bukti_id_pendaftar')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('bukti_id_pendaftar')->getRealPath(), [
                'folder' => 'bukti'
            ])->getSecurePath();
            $data['bukti_id_pendaftar'] = $uploadedFileUrl;
        }

        $school->update($data);

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            Campaign::where('id_sekolah', $id)->delete();
            User::where('id_sekolah', $id)->delete();

            $school = School::findOrFail($id);
            $school->delete();
        });

        return redirect()->route('schools.index')->with('success', 'Sekolah berhasil dihapus.');
    }

    public function show($id)
    {
        $school = School::findOrFail($id);
        return view('schools.show', compact('school'));
    }
}
