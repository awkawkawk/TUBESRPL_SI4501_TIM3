@ -0,0 +1,99 @@
@extends('layouts.master')

@section('content')

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

    <p class="h1 mb-2 mt-2 ml-2 mb-4 block text-l font-semibold text-black" >Manage Donatur</p>

    <div class="col-span-2 h-auto">
        <div class="h-auto w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
            <div class="mb-4 grid grid-cols-8 gap-x-4 lg:gap-x-8" style="grid-template-columns: 0.1fr 0.5fr 1fr 1fr 1fr 0.4fr 1fr 0.5fr 0.5fr">
                <!-- Profil Donatur -->

                <div>
                    <p class="h1 mb-1 ml-8 block text-sm font-semibold text-black mt-12">1.</p>
                </div>

                <div class="flex justify-center items-center mt-2">
                    <div class="rounded-full overflow-hidden w-20 h-20 flex justify-center items-center">
                        <img src="{{ asset('img/campaigns/sunjae.jpeg') }}" alt="" class="object-cover w-full h-full" />
                    </div>
                </div>

                 <!-- Nama Donatur -->
                 <div>
                    <p class="h1 mb-1 block text-sm font-semibold text-black mt-6">Nama Lengkap</p>
                    <p class="text-sm font-normal text-black dark:text-gray-400">Sun Jae</p>
                    <!-- <p class="h1 mb-1 block text-l font-semibold text-black mt-1">Sun Jae</p> -->
                </div>

                <!-- Email -->

                <div>
                    <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Email</p>
                    <p class="text-sm font-normal text-black dark:text-gray-400">sunjae@gmail.com</p>

                </div>

                <!-- No Hp -->
                <div>
                    <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Nomor Hp</p>
                    <p class="mr-6 text-sm font-normal text-black dark:text-gray-400">08123456789</p>
                    </p>
                </div>


                <!-- Status -->
                <div class="mr-8">
                    <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Status</p>
                    <p class="mb-4 mr-6 text-sm font-normal text-black dark:text-gray-400" style="color: #008000;">Aktif</p>
                    </p>
                </div>
                <div>
                    <p class="h1 mb-2 block text-sm font-semibold text-black mt-6">Tanggal Daftar</p>
                    <p class="mb-4 mr-6 text-sm font-normal text-black dark:text-gray-400">12 May 2024</p>
                </div>
                <div class="ml-4 mt-4">
                    <button class="text-white font-bold py-2 px-2 rounded-lg mt-4 flex items-center justify-center" style="background-color: #b3b53c;">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>

                    
                </div>
                <div class="mr-2 mt-4">
                <button class="text-white font-bold py-2 px-2 rounded-lg mt-4 flex items-center justify-center" style="background-color: #f57171;">
                        <svg class="h-6 w-6 text-stone-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>
                            <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="mb-1"></div>

</div>

@endsection