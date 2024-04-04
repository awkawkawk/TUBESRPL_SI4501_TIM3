@extends('layouts.master')

@section('content')

<div class="grid h-fit w-full grid-flow-row grid-cols-3 gap-x-8 gap-y-4">
    <div class="col-span-3 md:col-span-1">
        <div class="mt-8 text-left">
            <div class="flex items-center mb-8">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify"><b>Kembali ke halaman utama</b></a>
            </div>
        </div>
    </div>

    <div class="col-span-3 md:col-span-2">
        <div class="mb-4 text-left">
            <p class="h1 mb-2 block text-l font-semibold text-black" style=" margin-right: 1rem; padding-left: 1rem; padding-right: 1rem; margin-buttom: 1rem;">Donasi Sekolahmu</p>
            <div class="col-span-2 h-44" style="padding-left: 1rem; padding-right: 1rem; margin-top: 1.5rem">
                <div class="h-full w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">

                </div>
            </div>
        </div>



        <div class="mb-4 text-left">
            <div class="col-span-2 h-44" style="padding-left: 1rem; padding-right: 1rem; margin-top: 1.5rem; position: relative;">
                <!-- Garis pembagi atas -->
                <hr style="position: absolute; top: 50%; transform: translateY(-50%); width: 100%; border: 0; border-top: 1px solid #000000;">

                <!-- Gambar di atas kiri -->
                <img src="{{ asset('img/Untitled-1.png') }}" alt="Gambar" style="position: absolute; top: 0; left: 0; width: 80px; height: 64px;">

                <!-- Isi card -->
                <div class="h-full w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                    <!-- Isi konten di sini -->
                </div>

                <!-- Garis pembagi bawah -->
                <hr style="position: absolute; bottom: 50%; transform: translateY(50%); width: 100%; border: 0; border-top: 1px solid #e2e8f0;">
            </div>
        </div>
    </div>




</div>







@endsection
