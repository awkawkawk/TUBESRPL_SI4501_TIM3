@extends('layouts.master')

@section('content')

<div class="grid h-fit w-full grid-flow-row">
    <div class="md:col-span-1">
        <div class="mt-4 text-left">
            <div class="flex items-center mb-4">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
            </div>
        </div>
    </div>

    <div class="md:col-span-1">
        <div class="container" style="display: flex; justify-content: center;">
            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" >
                <p class="h1 mt-2 mb-2 block text-xl font-semibold text-black" >Ringkasan Donasi Anda</p>
                <hr>

                <!-- Ringkasan Donasi -->
                <div class="border border-gray-300 focus-within:border-indigo-500 rounded-md shadow-sm block w-full px-3 py-2 bg-blue-100 mt-6">


                    <div class="flex justify-between items-center mt-2">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Nama Campaign</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400"></p>
                    </div>



                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Donasi Ke</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400"></p>
                    </div>





                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Jasa Kirim</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">JNE</p>
                    </div>



                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Nomor Resi</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">234567</p>
                    </div>



                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-semibold text-black dark:text-gray-400">Nama Barang</p>
                        <p class="mb-2 text-sm font-semibold text-black dark:text-gray-400">Jumlah Barang</p>
                    </div>

                    <div class="flex justify-between items-center">
                        <p class="mb-1 ml-4 text-sm font-normal text-black dark:text-gray-400">Proyektor</p>
                        <p class="mb-1 text-sm font-normal text-black dark:text-gray-400">2</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="mb-1 ml-4 text-sm font-normal text-black dark:text-gray-400">Buku</p>
                        <p class="mb-1 text-sm font-normal text-black dark:text-gray-400">20</p>
                    </div>


                    <div class="flex justify-between items-center">
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400">Waktu Donasi</p>
                        <p class="mb-2 text-sm font-normal text-black dark:text-gray-400"></p>
                    </div>

                </div>

                <form method="POST" action="{{ route('donations.store') }}">
                    @csrf
                    <!-- Isi dengan elemen form lainnya seperti yang Anda perlukan -->
                    <p class="mb-2 mt-4 text-xs font-normal text-black dark:text-gray-400">* Anda dapat melakukan perubahan pada jasa kirim atau nomor resi setelah Kirim Donasi
                        Pastikan barang yang anda donasikan sudah benar</p>
                    <button type="submit" class="mt-4 w-full bg-primary text-white font-bold py-2 px-8 rounded-lg">
                        Kirim Donasi
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


