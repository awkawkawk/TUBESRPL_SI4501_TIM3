@extends('layouts.master')

@section('title', 'Halaman Utama - EduFund')

@section('content')
    <div class="flex h-fit w-full flex-wrap mt-8 items-center justify-center">
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
        <div id="default-carousel" class="relative mb-8 h-96 w-4/5 drop-shadow-xl" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative me-4 h-full overflow-hidden rounded-lg">
                @foreach ($news as $index => $new)
                    @if ($index >= 6)
                    @break
                @endif
                <a href="{{ $new->link }}" target="_blank">
                    <x-news-carousel image-path="{{ $new->image }}" alt-text="{{ $new->title }}"
                        title="{{ $new->title }}" description="{{ strip_tags($new->content) }}" />
                </a>
            @endforeach
            <!-- Slider indicators -->
            <div class="absolute bottom-3 left-1/2 z-30 flex -translate-x-1/2 space-x-2 rtl:space-x-reverse">
                @foreach ($news as $index => $new)
                    @if ($index >= 6)
                    @break
                @endif
                <button type="button" class="h-2 w-2 rounded-full"
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
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
<div class="h-80 w-4/5 lg:h-44">
    <div
        class="me-16 ms-16 h-8 rounded-t-lg bg-gradient-to-r from-gray-800 to-gray-600 p-1 text-center font-bold tracking-wide text-white">
        Campaign Terakhirmu!
    </div>
    <div id="controls-carousel" class="relative h-full w-full lg:h-36" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div
            class="relative me-16 ms-16 h-full overflow-hidden rounded-b-lg border border-gray-400 bg-white drop-shadow-md">
            <!-- Item 1 -->
            @foreach ($campaignsLatest as $index => $latest)
                <x-donation-carousel is-active="{{ $index === 0 ? 'true' : 'false' }}"
                    image="{{ $latest->foto_campaign ?? 'Campaign Tidak Tersedia' }}"
                    title="{{ $latest->nama_campaign ?? 'Nama Sekolah Tidak Tersedia' }}"
                    location="{{ $latest->school->nama_sekolah ?? 'Alamat Sekolah Tidak Tersedia' }}"
                    description="{{ $latest->deskripsi_campaign ?? 'Deskripsi Tidak Tersedia' }}" />
            @endforeach
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
                <svg class="h-4 w-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>

<div class="flex w-full mb-8 items-center justify-center text-center">
    <div class="from-primary to-primarylight mt-6 grid w-4/5 grid-cols-4 gap-10 rounded-lg bg-gradient-to-r p-4">
        <a href="{{ route('search.result') }}"
            class="hover:bg-primarydark group flex flex-col items-center rounded-lg p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="size-8 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <span class="font-semi ml-2 mt-2 text-white">Cari Sekolah</span>
        </a>
        <a href="{{ route('index.donation') }}"
            class="hover:bg-primarydark group flex flex-col items-center rounded-lg p-2">
            <svg class="size-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
            </svg>
            <span class="font-semi ml-2 mt-2 text-white">Donasi Sekarang</span>
        </a>

        <a href="http://127.0.0.1:8000/donation/history"
            class="hover:bg-primarydark group flex flex-col items-center rounded-lg p-2">
            <svg class="size-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <polyline points="12 8 12 12 14 14" />
                <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
            </svg>
            <span class="font-semi ml-2 mt-2 text-white">Riwayat Donasi</span>
        </a>

        <a href="{{ route('register.school.form') }}"
            class="hover:bg-primarydark group flex flex-col items-center rounded-lg p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-9 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>

            <span class="font-semi ml-2 mt-2 text-white">Daftarkan Sekolah</span>
        </a>

    </div>
</div>

{{-- <div class="col-span-3 mt-16 w-full lg:mt-4">
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
{{-- <div class="w-full text-center">
                <button type="button" onclick="renderCampaignCards(@json($campaigns))"
                    class="bg-primary mt-4 inline-flex h-10 items-center rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Lihat
                    semua <svg class="ms-4 h-3 w-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1v12m0 0 4-4m-4 4L1 9" />
                    </svg></button>
            </div>
            <div class="flex w-full items-center justify-center text-center">
                <div
                    class="from-primary to-primarylight mt-6 grid h-24 w-4/5 grid-cols-3 gap-10 rounded-lg bg-gradient-to-r">
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
        </div> --}}


</div>

</div>
{{-- <script>
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
    </script> --}}

@endsection
