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

    <div class="col-span-3 md:col-span-2">
        <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;"> <!-- Atur jarak di sini -->
            <p class="h1 mb-2 block text-l font-semibold text-black" style="margin-bottom: 1rem;">Riwayat Donasi Sekolahmu</p>

            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" style="background-image: url('{{ asset('img/sample-riwayat.jpg') }}')" title="Campaign Anda">
                </div>
                <div class="border border-gray-200 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal flex-grow">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 2fr 1fr 1fr 0.5fr">
                        <!-- Identitas Sekolah -->
                        <div>
                            <p class="h1 mb-0 block text-xl font-semibold text-black" >SMP Negeri 01 Arara</p> <!-- nama sekolah -->
                            <p class="mb-1 text-s font-normal text-black dark:text-gray-400">Arara, Jawa Barat</p> <!-- alamat sekolah -->
                            <p class="mb-0 mt-2 block text-s font-semibold text-black dark:text-gray-400">Perbaikan Ruang Belajar</p> <!-- Nama Campaign -->
                            <p class="mb-4 text-sm font-normal text-black dark:text-gray-400">Membutuhkan donasi untuk memperbaiki ruang belajar kelas IV. Kondisi ruangan sudah tidak layak dan tidak aman bagi siswa belajar.</p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">06 April 2024</p>
                        </div>

                        <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Sekolahmu</p> <!-- nama sekolah -->
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Meja</span>
                                <span>10</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Kursi</span>
                                <span>10</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Uang</span>
                                <span>500.000</span>
                            </p>

                        </div>

                        <!-- Target Donasi -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Target Donasi</p> <!-- nama sekolah -->
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Meja</span>
                                <span>20</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Kursi</span>
                                <span>20</span>
                            </p>
                            <p class="mb-1 my-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Uang</span>
                                <span>1.000.000</span>
                            </p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-2 grid grid-cols-2 gap-x-4 lg:gap-x-8" style="grid-template-columns: 50%, 50%">
                        <div class="flex justify-center items-center">
                            <button class="text-white font-bold py-2 px-8 rounded-lg" style="background-color: #42BB4E;">
                                Sedang Berlangsung
                            </button>
                        </div>

                        <div class="flex justify-center items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg relative flex items-center">
                                Lihat Donatur
                                <span class="ml-2">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </span>

                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mb-4"></div> <!--Sampai Sini -->

            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" style="background-image: url('{{ asset('img/sample-riwayat.jpg') }}')" title="Woman holding a mug">
                </div>
                <div class="border border-gray-200 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal flex-grow">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 2fr 1fr 1fr 0.5fr">
                        <!-- Identitas Sekolah -->
                        <div>
                            <p class="h1 mb-1 block text-xl font-semibold text-black" >SMP Negeri 1 Arara</p> <!-- nama sekolah -->
                            <p class="mb-4 text-s font-normal text-black dark:text-gray-400">Arara, Jawa Barat</p> <!-- alamat sekolah -->
                            <p class="mb-4 text-sm font-normal text-black dark:text-gray-400">Memerlukan donasi untuk memperbaiki gedung perpustakaan. Gedung sudah tidak layak untuk digunakan</p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">06 April 2024</p>
                        </div>

                        <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Sekolahmu</p> <!-- nama sekolah -->
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Uang</span>
                                <span>5.000.000</span>
                            </p>
                        </div>

                        <!-- Target Donasi -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Target Donasi</p> <!-- nama sekolah -->
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Uang</span>
                                <span>10.000.0000</span>
                            </p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-2 grid grid-cols-2 gap-x-4 lg:gap-x-8" style="grid-template-columns: 50%, 50%">
                        <div class="flex justify-center items-center">
                            <button class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                                Menunggu Verifikasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4"></div> <!--Sampai Sini -->

            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" style="background-image: url('{{ asset('img/sample-riwayat.jpg') }}')" title="Woman holding a mug">
                </div>
                <div class="border border-gray-200 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal flex-grow">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 2fr 1fr 1fr 0.5fr">
                        <!-- Identitas Sekolah -->
                        <div>
                            <p class="h1 mb-1 block text-xl font-semibold text-black" >SMP Negeri 01 Arara</p> <!-- nama sekolah -->
                            <p class="mb-4 text-s font-normal text-black dark:text-gray-400">Arara, Jawa Barat</p> <!-- alamat sekolah -->
                            <p class="mb-4 text-sm font-normal text-black dark:text-gray-400">Banyak siswa yang tidak memiliki alat tulis menulis yang memadai. </p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">06 April 2024</p>
                        </div>

                        <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Sekolahmu</p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Buku Tulis</span>
                                <span>100</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Pensil</span>
                                <span>200</span>
                            </p>
                        </div>

                        <!-- Target Donasi -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Target Donasi</p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Buku Tulis</span>
                                <span>100</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Pensil</span>
                                <span>200</span>
                            </p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-2 grid grid-cols-2 gap-x-4 lg:gap-x-8" style="grid-template-columns: 50%, 50%">
                        <div class="flex justify-center items-center">
                            <button class="bg-zinc-500 hover:bg-zinc-600 text-white font-bold py-2 px-8 rounded-lg">
                                Campaign Selesai
                            </button>
                        </div>

                        <div class="flex justify-center items-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg relative flex items-center">
                                Lihat Donatur
                                <span class="ml-2">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4"></div> <!--Sampai Sini -->

            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-lg lg:rounded-t-none lg:rounded-l-lg text-center overflow-hidden" style="background-image: url('{{ asset('img/sample-riwayat.jpg') }}')" title="Woman holding a mug">
                </div>
                <div class="border border-gray-200 bg-white rounded-b-lg lg:rounded-b-none lg:rounded-r-lg p-4 flex flex-col justify-between leading-normal flex-grow">
                    <div class="mb-8 grid grid-cols-4 gap-x-4 lg:gap-x-8" style="grid-template-columns: 2fr 1fr 1fr 0.5fr">
                        <!-- Identitas Sekolah -->
                        <div>
                            <p class="h1 mb-1 block text-xl font-semibold text-black" >SMP Negeri 01 Arara</p> <!-- nama sekolah -->
                            <p class="mb-4 text-s font-normal text-black dark:text-gray-400">Arara, Jawa Barat</p> <!-- alamat sekolah -->
                            <p class="mb-4 text-sm font-normal text-black dark:text-gray-400">Banyak siswa yang tidak memiliki alat tulis menulis yang memadai. </p>
                            <p class="mb-2 text-xs font-normal text-black dark:text-gray-400">06 April 2024</p>
                        </div>

                        <!-- Donasi Masuk -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Donasi Sekolahmu</p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Buku Tulis</span>
                                <span>100</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="none">
                                    <circle cx="12" cy="12" r="10" fill="#42BB4E" />
                                    <path d="M9 12l2 2l4 -4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="mr-1">Pensil</span>
                                <span>200</span>
                            </p>
                        </div>

                        <!-- Target Donasi -->
                        <div>
                            <p class="h1 mb-2 block text-sm font-semibold text-black" style="margin-top:5px" >Target Donasi</p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Buku Tulis</span>
                                <span>100</span>
                            </p>
                            <p class="mb-1 text-sm font-normal text-black dark:text-gray-400 flex items-center my-1">
                                <svg class="h-5 w-5 text-red-500 mr-2" fill="#BB4242" viewBox="0 0 24 24" stroke="#BB4242">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="mr-1">Pensil</span>
                                <span>200</span>
                            </p>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-2 grid grid-cols-2 gap-x-4 lg:gap-x-8" style="grid-template-columns: 50%, 50%">
                        <div class="flex justify-center items-center">
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-8 rounded-lg">
                                Tidak Lulus Verifikasi
                            </button>
                        </div>

                        <div class="flex justify-center items-center">
                            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-8 rounded-lg relative flex items-center">
                                Edit Campaign
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
