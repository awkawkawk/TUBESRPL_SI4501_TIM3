@extends('layouts.master')

@section('content')

@if(session('success'))
    @if(session('success') == 'Sekolah berhasil dihapus.')
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded shadow-lg" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 15l-5.5-5.5 1.4-1.4L10 12.2l4.6-4.6 1.4 1.4L10 15z"/>
            </svg>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.remove();">
                    <path d="M14.348 5.652a.5.5 0 010 .707L10.707 10l3.641 3.641a.5.5 0 01-.707.707L10 10.707l-3.641 3.641a.5.5 0 01-.707-.707L9.293 10 5.652 6.359a.5.5 0 01.707-.707L10 9.293l3.641-3.641a.5.5 0 01.707 0z"/>
                </svg>
            </span>
        </div>
    @else
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded shadow-lg" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 15l-5.5-5.5 1.4-1.4L10 12.2l4.6-4.6 1.4 1.4L10 15z"/>
            </svg>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.remove();">
                    <path d="M14.348 5.652a.5.5 0 010 .707L10.707 10l3.641 3.641a.5.5 0 01-.707.707L10 10.707l-3.641 3.641a.5.5 0 01-.707-.707L9.293 10 5.652 6.359a.5.5 0 01.707-.707L10 9.293l3.641-3.641a.5.5 0 01.707 0z"/>
                </svg>
            </span>
        </div>
    @endif
@endif

<div class="grid h-fit w-full grid-flow-row">
    <div class="col-span-2 md:col-span-1">
        <div class="mt-4 text-left">
            <div class="flex items-center mb-8">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
            </div>
        </div>
    </div>
    <div class="mb-2"></div>

    <p class="h1 mb-2 mt-2 ml-2 mb-4 block text-l font-semibold text-black">Daftar Sekolah</p>

    <div class="col-span-2 h-auto">
        <div class="flex space-x-4">
            <p class="h1 mt-2 ml-2 mb-4 block text-l font-semibold text-black">Sekolah Terdaftar</p>
        </div>

        @foreach($schools as $school)
            <div class="h-auto w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800 mb-4">
                <div class="mb-4 grid grid-cols-8 gap-x-4 lg:gap-x-8" style="grid-template-columns: 0.1fr 0.3fr 1fr 1fr 1fr 1fr 1fr 0.4fr">
                    <!-- Profil Sekolah -->
                    <div>
                        <p class="h1 mb-1 ml-8 block text-sm font-semibold text-black mt-12">{{ $loop->iteration }}.</p>
                    </div>

                    <div class="flex justify-center items-center mt-2">
                        <div class="rounded-full overflow-hidden w-20 h-20 flex justify-center items-center">
                            <img src="{{ asset('storage/' . $school->logo_sekolah) }}" alt="Logo Sekolah" class="object-cover w-full h-full" />
                        </div>
                    </div>

                    <!-- Nama Sekolah -->
                    <div>
                        <p class="h1 mb-1 block text-sm font-semibold text-black mt-6">Nama Sekolah</p>
                        <p class="h1 mb-1 block text-l font-semibold text-black mt-1">{{ $school->nama_sekolah }}</p>
                    </div>

                    <!-- Email Sekolah -->
                    <div>
                        <p class="h1 mb-1 block text-sm font-semibold text-black mt-6">Email Sekolah</p>
                        <p class="text-sm font-normal text-black dark:text-gray-400 mt-1">{{ $school->email_sekolah }}</p>
                    </div>

                    <!-- Alamat Sekolah -->
                    <div>
                        <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Alamat</p>
                        <p class="mb-1 mt-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                            <span>{{ $school->alamat_sekolah }}</span>
                        </p>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">No. Telepon</p>
                        <p class="mr-6 text-sm font-normal text-black dark:text-gray-400">{{ $school->no_telepon_sekolah }}</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Status</p>
                        <p class="mb-4 mr-6 text-sm font-normal text-black dark:text-gray-400">{{ $school->status }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col space-y-2 mt-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('schools.edit', $school->id) }}" class="text-white font-bold py-2 px-2 rounded-lg bg-yellow-500 flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>

                            <form action="{{ route('schools.destroy', $school->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white font-bold py-2 px-2 rounded-lg bg-red-500 flex items-center justify-center">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
