@extends('layouts.master')

@section('title', 'Halaman Utama - EduFund')

@section('content')
    <div class="flex h-fit w-full flex-wrap items-center justify-center">
        @if (session('success'))
            <div id="toast-success"
                class="mb-4 flex w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                role="alert">
                <div
                    class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div id="default-carousel" class="relative mb-8 w-4/5 drop-shadow-xl h-96" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative me-4 h-full overflow-hidden rounded-lg">
                <!-- Item 1 -->
                <x-news-carousel image-path="img/Untitled-1.png" alt-text="Deskripsi gambar" />
                <!-- Item 2 -->
                <x-news-carousel image-path="img/Untitled-1.png" alt-text="Deskripsi gambar" />
                <!-- Item 3 -->
                <x-news-carousel image-path="img/Untitled-1.png" alt-text="Deskripsi gambar" />
                <!-- Item 4 -->
                <x-news-carousel image-path="img/Untitled-1.png" alt-text="Deskripsi gambar" />
                <!-- Item 5 -->
                <x-news-carousel image-path="img/Untitled-1.png" alt-text="Deskripsi gambar" />
                <!-- Slider indicators -->
                <div class="absolute bottom-3 left-1/2 z-30 flex -translate-x-1/2 space-x-2 rtl:space-x-reverse">
                    <button type="button" class="h-2 w-2 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="h-2 w-2 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="h-2 w-2 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="h-2 w-2 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="h-2 w-2 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                {{-- <button type="button"
                    class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white">
                        <svg class="h-2 w-2 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white">
                        <svg class="h-2 w-2 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button> --}}
            </div>
        </div>
        <div class="h-80 lg:h-44 w-4/5">
            <div
                class="me-16 ms-16 h-8 rounded-t-lg bg-gradient-to-r from-gray-800 to-gray-600 p-1 text-center font-bold tracking-wide text-white">
                Donasi Terakhir Anda!
            </div>
            <div id="controls-carousel" class="relative h-full w-full lg:h-36" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div
                    class="relative me-16 ms-16 h-full overflow-hidden rounded-b-lg border border-gray-400 bg-white drop-shadow-md">
                    <!-- Item 1 -->
                    <x-donation-carousel :is-active="true" title="SMAN 1 Blitar" location="Blitar, Jawa Timur"
                        description="Bantu sekolah kami karena kurang dana dari pemerintah" />
                    <!-- Item 2 -->
                    <x-donation-carousel :is-active="false" title="SMAN 1 Blitar" location="Blitar, Jawa Timur"
                        description="Bantu sekolah kami karena kurang dana dari pemerintah" />
                    <!-- Item 3 -->
                    <x-donation-carousel :is-active="false" title="SMAN 1 Blitar" location="Blitar, Jawa Timur"
                        description="Bantu sekolah kami karena kurang dana dari pemerintah" />
                    <!-- Item 4 -->
                    <x-donation-carousel :is-active="false" title="SMAN 1 Blitar" location="Blitar, Jawa Timur"
                        description="Bantu sekolah kami karena kurang dana dari pemerintah" />
                    <!-- Item 5 -->
                    <x-donation-carousel :is-active="false" title="SMAN 1 Blitar" location="Blitar, Jawa Timur"
                        description="Bantu sekolah kami karena kurang dana dari pemerintah" />
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="group absolute start-0 top-0 z-30 my-auto flex h-full cursor-pointer items-center justify-center px-3 focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-black group-hover:bg-black/70 group-focus:outline-none group-focus:ring-4 group-focus:ring-white">
                        <svg class="h-4 w-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="group absolute end-0 top-0 z-30 my-auto flex h-full cursor-pointer items-center justify-center px-3 focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-black group-hover:bg-black/70 group-focus:outline-none group-focus:ring-4 group-focus:ring-white">
                        <svg class="h-4 w-4 text-white rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="col-span-3 mt-16 w-full lg:mt-4">
            <p class="h1 mb-2 block text-center text-xl font-semibold text-black">Campaign Populer</p>
            <p class="mx-auto mb-8 w-1/2 text-center text-sm font-light text-black">Mereka butuh uluran tangan kita. Karena
                sedikit
                bantuan
                dari kita adalah harapan besar bagi mereka.</p>
            <div class="flex flex-wrap justify-center gap-4 text-left" id="campaign-cards-container"></div>
            {{-- @foreach (range(1, $numberOfIterations) as $index)
                    <x-campaign-card link="#" image-path="img/Untitled-1.png"
                        alt-text="Deskripsi gambar SMAN Arara 1" title="SMAN Arara 1" location="Arara, Jawa Barat"
                        description="Butuh donasi untuk memperbaiki kerusakan sekolah" percentage-collected="90" />
                @endforeach --}}
            <div class="w-full text-center">
                <button type="button" onclick="renderCampaignCards(@json($campaigns))"
                    class="mt-4 inline-flex h-10 items-center rounded-lg bg-primary px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Lihat
                    semua <svg class="ms-4 h-3 w-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1v12m0 0 4-4m-4 4L1 9" />
                    </svg></button>
            </div>
            <div class="flex w-full text-center items-center justify-center">
                <div class="mt-6 grid h-24 w-4/5 grid-cols-3 gap-10 rounded-lg bg-gradient-to-r from-primary to-primarylight">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-center text-sm text-white">Sekolah Terbantu</p>
                        <p class="mt-1 text-2xl font-bold text-white">25.000</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-center text-sm text-white">Donasi Terkumpul</p>
                        <p class="mt-1 text-2xl font-bold text-white">25.000</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-center text-sm text-white">Total Donatur</p>
                        <p class="mt-1 text-2xl font-bold text-white">25.000</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    <script>
        var renderedCampaignsIndex = 0; // Variabel untuk melacak indeks kampanye yang sudah dirender

        document.addEventListener('DOMContentLoaded', function() {
            var campaigns = @json($campaigns);
            renderCampaignCards(campaigns);
        });

        function renderCampaignCards(campaigns) {
            var screenWidth = window.innerWidth;
            var numOfCards = Math.floor(screenWidth / 272);
            var cardsContainer = document.getElementById('campaign-cards-container');

            // Render kampanye baru sebanyak numOfCards yang belum dirender
            for (var i = 0; i < numOfCards && renderedCampaignsIndex < campaigns.length; i++) {
                var campaign = campaigns[renderedCampaignsIndex];
                cardsContainer.innerHTML += `
                <x-campaign-card link="/campaign/detail/${campaign.id}"
                    image-path="${campaign.foto_campaign}" alt-text="${campaign.nama_campaign}"
                    title="${campaign.nama_campaign}" location="${campaign.school.alamat_sekolah}"
                    description="${campaign.deskripsi_campaign}" percentage-collected="${campaign.percentage_collected}" />
            `;
                renderedCampaignsIndex++;
            }
        }
    </script>

@endsection
