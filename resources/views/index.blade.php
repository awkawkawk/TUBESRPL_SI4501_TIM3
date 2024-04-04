@extends('layouts.master')

@section('content')
    <div class="grid h-fit w-full grid-flow-row grid-cols-3 gap-x-8 gap-y-4">

        <div id="default-carousel" class="relative h-44 w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-full overflow-hidden rounded-lg">
                <!-- Item 1 -->
                <div class="hidden object-cover duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 4 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/Untitled-1.png') }}"
                        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                        alt="...">
                </div>
                <!-- Item 5 -->
                <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('assets/img/Untitled-1.png') }}"
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
                <button type="button"
                    class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                        <svg class="h-2 w-2 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
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
                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                        <svg class="h-2 w-2 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="col-span-2 h-44">
            <div class="h-full w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                <div class="flex h-full w-12 rounded-l-lg bg-gray-700"></div>
            </div>
        </div>
        <div class="col-span-3">
            <p class="h1 mb-2 block text-center text-xl font-semibold">Campaign Populer</p>
            <p class="mx-auto mb-8 w-1/2 text-center text-sm font-light">Mereka butuh uluran tangan kita. Karena sedikit
                bantuan
                dari kita adalah harapan besar bagi mereka.</p>
            <div class="flex gap-4">
                <div
                    class="w-1/4 max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('assets/img/Untitled-1.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">SMAN Arara 1</h5>
                        </a>
                        <p class="mb-2 text-xs font-normal text-gray-700 dark:text-gray-400">Arara, Jawa Barat</p>
                        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Butuh donasi untuk memperbaiki
                            kerusakan sekolah</p>
                        <div class="mb-1 text-base font-medium dark:text-white">Small</div>
                        <div class="mb-4 h-1.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-1.5 rounded-full bg-blue-600 dark:bg-blue-500" style="width: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
