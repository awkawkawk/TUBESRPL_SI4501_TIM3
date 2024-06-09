@php
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layouts.master')
    
@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-semibold mb-6">Edit Sekolah</h2>

    <form action="{{ route('schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Sekolah -->
        <div class="mb-4">
            <label for="nama_sekolah" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" id="nama_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_sekolah', $school->nama_sekolah) }}" required>
        </div>

        <!-- Alamat Sekolah -->
        <div class="mb-4">
            <label for="alamat_sekolah" class="block text-sm font-medium text-gray-700">Alamat Sekolah</label>
            <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('alamat_sekolah', $school->alamat_sekolah) }}" required>
        </div>

        <!-- Nomor Telepon Sekolah -->
        <div class="mb-4">
            <label for="no_telepon_sekolah" class="block text-sm font-medium text-gray-700">Nomor Telepon Sekolah</label>
            <input type="text" name="no_telepon_sekolah" id="no_telepon_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('no_telepon_sekolah', $school->no_telepon_sekolah) }}" required>
        </div>

        <!-- Email Sekolah -->
        <div class="mb-4">
            <label for="email_sekolah" class="block text-sm font-medium text-gray-700">Email Sekolah</label>
            <input type="email" name="email_sekolah" id="email_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email_sekolah', $school->email_sekolah) }}" required>
        </div>

        <!-- Logo Sekolah -->
        <div class="mb-4">
            <label for="logo_sekolah" class="block text-sm font-medium text-gray-700">Logo Sekolah</label>
            <input type="file" name="logo_sekolah" id="logo_sekolah" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
            @if($school->logo_sekolah)
                <img src="{{  Storage::url($school->logo_sekolah) }}" alt="Logo Sekolah" class="mt-4 w-20 h-20 object-cover"referrerpolicy="no-referrer">
            @endif
        </div>

        <!-- Nama Pendaftar -->
        <div class="mb-4">
            <label for="nama_pendaftar" class="block text-sm font-medium text-gray-700">Nama Pendaftar</label>
            <input type="text" name="nama_pendaftar" id="nama_pendaftar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('nama_pendaftar', $school->nama_pendaftar) }}" required>
        </div>

        <!-- Nomor HP Pendaftar -->
        <div class="mb-4">
            <label for="no_hp_pendaftar" class="block text-sm font-medium text-gray-700">Nomor HP Pendaftar</label>
            <input type="text" name="no_hp_pendaftar" id="no_hp_pendaftar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('no_hp_pendaftar', $school->no_hp_pendaftar) }}" required>
        </div>

        <!-- Email Pendaftar -->
        <div class="mb-4">
            <label for="email_pendaftar" class="block text-sm font-medium text-gray-700">Email Pendaftar</label>
            <input type="email" name="email_pendaftar" id="email_pendaftar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email_pendaftar', $school->email_pendaftar) }}" required>
        </div>

        <!-- Identitas Pendaftar -->
        <div class="mb-4">
            <label for="identitas_pendaftar" class="block text-sm font-medium text-gray-700">Identitas Pendaftar</label>
            <input type="text" name="identitas_pendaftar" id="identitas_pendaftar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('identitas_pendaftar', $school->identitas_pendaftar) }}" required>
        </div>

        <!-- Bukti ID Pendaftar -->
        <div class="mb-4">
            <label for="bukti_id_pendaftar" class="block text-sm font-medium text-gray-700">Bukti ID Pendaftar</label>
            <input type="file" name="bukti_id_pendaftar" id="bukti_id_pendaftar" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
            @if($school->bukti_id_pendaftar)
                <img src="{{ Storage::url($school->bukti_id_pendaftar) }}" alt="Bukti ID Pendaftar" class="mt-4 w-20 h-20 object-cover"referrerpolicy="no-referrer">
            @endif
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('status', $school->status) }}" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
