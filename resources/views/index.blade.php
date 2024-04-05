@extends('layouts.master')

@section('content')
    <div class="h-fit w-full flex flex-wrap">
        <div id="default-carousel" class="w-1/3 relative mb-8 h-44 drop-shadow-xl" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden rounded-lg me-4">
                <!-- Item 1 -->
                <div class="hidden object-cover duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 4 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 5 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
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
        <div class="h-44 w-2/3">
            <div
                class="flex h-full w-full rounded-lg border border-gray-200 bg-white">

                <div class="from-primary to-primarylight flex h-full w-12 rounded-l-lg bg-gradient-to-r">
                    <span
                        class="item-center flex translate-x-7 -rotate-90 transform justify-center whitespace-nowrap font-bold tracking-wide text-white">Donasi
                        Sekarang!</span>
                </div>

                <div id="controls-carousel" class="relative my-auto h-36 w-full" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative me-16 ms-16 h-36 overflow-hidden rounded-lg border drop-shadow-md">
                        <!-- Item 1 -->
                        <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('img/Untitled-1.png') }}"
                                class="absolute right-1/2 top-1/2 me-6 block w-64 -translate-y-1/2 rounded" alt="...">
                            <div
                                class="translate-x-fixcarousel absolute z-40 ms-4 hidden h-full w-fit bg-white p-4 text-black md:block">
                                <h5 class="font-bold">SMAN 1 Blitar</h5>
                                <p class="text-xs">
                                    Blitar, Jawa Timur
                                </p>
                                <p class="text-wrap mt-2 w-5/6 text-xs">
                                    Bantu sekolah kami karena kurang dana dari pemerintah
                                </p>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('img/Untitled-1.png') }}"
                                class="absolute right-1/2 top-1/2 me-6 block w-64 -translate-y-1/2 rounded" alt="...">
                            <div
                                class="translate-x-fixcarousel absolute z-40 ms-4 hidden h-full w-fit bg-white p-4 text-black md:block">
                                <h5 class="font-bold">SMAN 1 Blitar</h5>
                                <p class="text-xs">
                                    Blitar, Jawa Timur
                                </p>
                                <p class="text-wrap mt-2 w-5/6 text-xs">
                                    Bantu sekolah kami karena kurang dana dari pemerintah
                                </p>
                            </div>
                        </div>
                        <!-- Item 3 -->
                        <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('img/Untitled-1.png') }}"
                                class="absolute right-1/2 top-1/2 me-6 block w-64 -translate-y-1/2 rounded" alt="...">
                            <div
                                class="translate-x-fixcarousel absolute z-40 ms-4 hidden h-full w-full bg-white p-4 text-black md:block">
                                <h5 class="font-bold">SMAN 1 Blitar</h5>
                                <p class="text-xs">
                                    Blitar, Jawa Timur
                                </p>
                                <p class="text-wrap mt-2 w-1/2 text-xs">
                                    Bantu sekolah kami karena kurang dana dari pemerintah
                                </p>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('img/Untitled-1.png') }}"
                                class="absolute right-1/2 top-1/2 me-6 block w-64 -translate-y-1/2 rounded" alt="...">
                            <div
                                class="translate-x-fixcarousel absolute z-40 ms-4 hidden h-full w-fit bg-white p-4 text-black md:block">
                                <h5 class="font-bold">SMAN 1 Blitar</h5>
                                <p class="text-xs">
                                    Blitar, Jawa Timur
                                </p>
                                <p class="text-wrap mt-2 w-5/6 text-xs">
                                    Bantu sekolah kami karena kurang dana dari pemerintah
                                </p>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('img/Untitled-1.png') }}"
                                class="absolute right-1/2 top-1/2 me-6 block w-64 -translate-y-1/2 rounded" alt="...">
                            <div
                                class="translate-x-fixcarousel absolute z-40 ms-4 hidden h-full w-fixcarouselitem5  bg-white p-4 text-black md:block">
                                <h5 class="font-bold">SMAN 1 Blitar</h5>
                                <p class="text-xs">
                                    Blitar, Jawa Timur
                                </p>
                                <p class="text-wrap mt-2 w-5/6 text-xs">
                                    Bantu sekolah kami karena kurang dana dari pemerintah
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-3 focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-black group-hover:bg-black/70 group-focus:outline-none group-focus:ring-4 group-focus:ring-white">
                            <svg class="h-4 w-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-3 focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-black group-hover:bg-black/70 group-focus:outline-none group-focus:ring-4 group-focus:ring-white">
                            <svg class="h-4 w-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>



            </div>
        </div>
        <div class="col-span-3">
            <p class="h1 mb-2 block text-center text-xl font-semibold text-black">Campaign Populer</p>
            <p class="mx-auto mb-8 w-1/2 text-center text-sm font-light text-black">Mereka butuh uluran tangan kita. Karena
                sedikit
                bantuan
                dari kita adalah harapan besar bagi mereka.</p>
            <div class="flex flex-wrap justify-center gap-4 text-left">
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
                    <a href="#">
                        <img class="h-64 rounded-t-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                            alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-black">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-black">Arara, Jawa Barat</p>
                        <p class="mb-4 text-sm font-normal text-black">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 flex w-full text-xs font-medium">
                            <p>Terkumpul</p>
                            <p class="text-primary ms-auto font-bold">50%</p>
                        </div>
                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                            <div class="bg-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
                <button type="button"
                    class="mt-4 block inline-flex h-10 items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Lihat
                    semua <svg class="ms-4 h-3 w-3 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1v12m0 0 4-4m-4 4L1 9" />
                    </svg></button>
                <div class="mt-6 grid h-24 w-11/12 grid-cols-3 gap-10 rounded-lg bg-gray-700">
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
@endsection
