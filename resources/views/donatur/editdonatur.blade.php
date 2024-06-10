@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-semibold mb-6">Edit Donatur</h2>

    <form action="{{ route('admin.donatur.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Donatur -->
        <div>
            <label for="name">Nama</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('nama', $user->nama) }}"
                required autofocus autocomplete="name" />
        </div>

        <!-- Email -->
        <div class="my-4">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />
        </div>

        <!-- Nomor Telepon Donatur -->
        <div class="mb-4">
            <label for="phone">Nomor Handphone</label>
            <input id="phone" name="phone" type="text" class="mt-1 block w-full"
                value="{{ old('phone', $user->phone) }}" required autofocus autocomplete="phone" />
        </div>

        <!-- Peran -->
        <div class="mb-4">
            <label for="peran">Peran</label>
            <select id="peran" name="peran" class="mt-1 block w-full" required autofocus>
                <option value="donatur" {{ old('peran', $user->tipe_user) == 'donatur' ? 'selected' : '' }}>Donatur
                </option>
                <option value="sekolah" {{ old('peran', $user->tipe_user) == 'sekolah' ? 'selected' : '' }}>Sekolah
                </option>
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
        </div>

        <!-- <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button> -->
    </form>
</div>
@endsection
