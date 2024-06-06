<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use App\Models\Campaign;
use App\Http\Requests\StoreschoolRequest;
use App\Http\Requests\UpdateschoolRequest;
use Illuminate\Support\Facades\DB;
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
            $data['logo_sekolah'] = $request->file('logo_sekolah')->store('public/logos');
        }
        if ($request->hasFile('bukti_id_pendaftar')) {
            $data['bukti_id_pendaftar'] = $request->file('bukti_id_pendaftar')->store('public/identities');
        }

        School::create($data);

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }

    public function edit(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school)
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
            $data['logo_sekolah'] = $request->file('logo_sekolah')->store('public/logos');
        }
        if ($request->hasFile('bukti_id_pendaftar')) {
            $data['bukti_id_pendaftar'] = $request->file('bukti_id_pendaftar')->store('public/identities');
        }

        $school->update($data);

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        // Gunakan DB transaction untuk memastikan konsistensi data
        DB::transaction(function () use ($id) {
            // Hapus data yang berhubungan di tabel campaigns terlebih dahulu
            Campaign::where('id_sekolah', $id)->delete();
            User::where('id_sekolah', $id)->delete();

            // Hapus sekolah
            $school = School::findOrFail($id);
            $school->delete();
        });

        return redirect()->route('schools.index')->with('success', 'Sekolah berhasil dihapus.');
    }

    // Metode lain di controller...
}
