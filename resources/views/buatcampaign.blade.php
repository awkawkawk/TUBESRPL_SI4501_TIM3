@extends('layouts.app')

@section('title', 'Tambah Campaign')

@section('content')
<<<<<<< HEAD
<div class="container mx-auto my-8 px-6 md:px-12">
<div id="additionalGoodsFields"></div>
    <div class="flex flex-wrap justify-center">
        <div class="w-full lg:w-8/12 px-4">
            <div class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-white shadow-lg">
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-700 text-sm font-bold">
                            Tambah Campaign
                        </h6>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase">
                            Informasi Campaign
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignImage">
                                        Foto Campaign
                                    </label>
                                    <input type="file" id="campaignImage" name="image" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignName">
                                        Nama Campaign
                                    </label>
                                    <input type="text" id="campaignName" name="name" required class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignDescription">
                                        Deskripsi Campaign
                                    </label>
                                    <textarea rows="4" id="campaignDescription" name="description" required class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150"></textarea>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="donationType">
                                        Jenis Sumbangan
                                    </label>
                                    <select id="donationType" name="donation_type" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" onchange="showDonationOptions()">
                                        <option value="">Pilih Jenis Sumbangan</option>
                                        <option value="money">Uang</option>
                                        <option value="goods">Barang</option>
                                        <option value="money_and_goods">Uang dan Barang</option>
                                    </select>
                                </div>
                            </div>
                            <div id="donationMoney" class="hidden w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="targetDonation">
                                        Target Donasi Uang
                                    </label>
                                    <input type="number" id="targetDonation" name="target_donation" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div id="donationGoods" class="hidden w-full px-4">
                                <div id="goodsContainer" class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="targetGoods">
                                        Target Donasi Barang
                                    </label>
                                </div>
                                <div id="additionalGoodsFields"></div>
                                <div class="text-right">
                                    <button type="button" class="inline-block bg-blue-500 text-white active:bg-blue-600 text-sm font-bold uppercase px-3 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" onclick="addGoodsField()">
                                        Tambah Barang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <button class="bg-blue-500 text-white active:bg-blue-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
=======
    <div class="h-fit w-full flex flex-wrap">
        <div id="default-carousel" class="lg:w-1/3 w-full h-64 relative mb-8 lg:h-44 drop-shadow-xl" data-carousel="slide">
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
        <div class="lg:h-44 lg:w-2/3 h-80 w-full">
            <div class="me-16 ms-16 p-1 from-gray-500 to-gray-400 rounded-t-lg bg-gradient-to-r text-center font-bold tracking-wide text-white h-8">
                Donasi Sekarang!
            </div>
            <div id="controls-carousel" class="relative lg:h-36 h-full w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative me-16 ms-16 h-full overflow-hidden rounded-b-lg border bg-white border-gray-400 drop-shadow-md">
                    <!-- Item 1 -->
                    <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('img/Untitled-1.png') }}"
                            class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
                        <div
                            class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
                            <h5 class="font-bold">SMAN 1 Blitar</h5>
                            <p class="text-xs">
                                Blitar, Jawa Timur
                            </p>
                            <p class="text-wrap mt-2 w-full text-xs">
                                Bantu sekolah kami karena kurang dana dari pemerintah
                            </p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/Untitled-1.png') }}"
                            class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
                        <div
                            class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
                            <h5 class="font-bold">SMAN 1 Blitar</h5>
                            <p class="text-xs">
                                Blitar, Jawa Timur
                            </p>
                            <p class="text-wrap mt-2 w-full text-xs">
                                Bantu sekolah kami karena kurang dana dari pemerintah
                            </p>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/Untitled-1.png') }}"
                            class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
                        <div
                            class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
                            <h5 class="font-bold">SMAN 1 Blitar</h5>
                            <p class="text-xs">
                                Blitar, Jawa Timur
                            </p>
                            <p class="text-wrap mt-2 w-full text-xs">
                                Bantu sekolah kami karena kurang dana dari pemerintah
                            </p>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/Untitled-1.png') }}"
                            class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
                        <div
                            class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
                            <h5 class="font-bold">SMAN 1 Blitar</h5>
                            <p class="text-xs">
                                Blitar, Jawa Timur
                            </p>
                            <p class="text-wrap mt-2 w-full text-xs">
                                Bantu sekolah kami karena kurang dana dari pemerintah
                            </p>
                        </div>
                    </div>
                    <!-- Item 5 -->
                    <div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('img/Untitled-1.png') }}"
                            class="absolute w-full lg:h-full h-48 object-cover me-auto block lg:w-64" alt="...">
                        <div
                            class="absolute z-40 lg:ms-64 lg:mt-0 mt-48 h-full w-full p-4 text-black md:block">
                            <h5 class="font-bold">SMAN 1 Blitar</h5>
                            <p class="text-xs">
                                Blitar, Jawa Timur
                            </p>
                            <p class="text-wrap mt-2 w-full text-xs">
                                Bantu sekolah kami karena kurang dana dari pemerintah
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="group absolute h-full start-0 top-0 z-30 flex my-auto cursor-pointer items-center justify-center px-3 focus:outline-none"
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
                    class="group absolute end-0 top-0 z-30 flex h-full my-auto cursor-pointer items-center justify-center px-3 focus:outline-none"
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
        <div class="col-span-3 lg:mt-4 mt-16">
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
                <div class="w-full text-center">
                    <button type="button"
                        class="mt-4 inline-flex h-10 items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Lihat
                        semua <svg class="ms-4 h-3 w-3 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1v12m0 0 4-4m-4 4L1 9" />
                        </svg></button>
                </div>
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
>>>>>>> 189e99869fc6ac9b4125b191e4eeea4924dddd95
                </div>
            </div>
        </div>

    </div>
</div>
<script>
// Fungsi untuk menampilkan opsi donasi berdasarkan jenis sumbangan yang dipilih
function showDonationOptions() {
    var donationType = document.getElementById('donationType').value;
    var donationMoneyDiv = document.getElementById('donationMoney');
    var donationGoodsDiv = document.getElementById('donationGoods');
    
    donationMoneyDiv.style.display = donationType === 'money' || donationType === 'money_and_goods' ? 'block' : 'none';
    donationGoodsDiv.style.display = donationType === 'goods' || donationType === 'money_and_goods' ? 'block' : 'none';
}

// Fungsi untuk menambahkan field barang baru
function addGoodsField() {
    var container = document.getElementById('donationGoods'); // Pastikan ini merujuk ke div yang benar

    // Membuat div baru untuk mengelompokkan input jumlah barang dan dropdown tipe barang
    var divGroup = document.createElement('div');
    divGroup.classList.add('flex', 'flex-wrap', 'mb-3');

    // Membuat input untuk jumlah barang
    var targetGoodsInput = document.createElement('input');
    targetGoodsInput.type = 'number';
    targetGoodsInput.name = 'target_goods[]';
    targetGoodsInput.placeholder = 'Jumlah Barang';
    targetGoodsInput.classList.add('border', 'px-4', 'py-2', 'rounded', 'mr-3', 'mb-3', 'flex-1');
    divGroup.appendChild(targetGoodsInput);

    // Membuat dropdown untuk tipe barang
    var goodsTypeSelect = document.createElement('select');
    goodsTypeSelect.name = 'goods_type[]';
    goodsTypeSelect.classList.add('border', 'px-4', 'py-2', 'rounded', 'mr-3', 'mb-3', 'flex-1');

    var defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Pilih Barang';
    goodsTypeSelect.appendChild(defaultOption);

    var options = ['Kursi', 'Meja', 'Alat Tulis', 'Lain-lain'];
    options.forEach(function(item) {
        var option = document.createElement('option');
        option.value = item.toLowerCase();
        option.textContent = item;
        goodsTypeSelect.appendChild(option);
    });

    divGroup.appendChild(goodsTypeSelect);

    // Memasukkan divGroup sebelum tombol Tambah Barang
    var addButton = container.querySelector('.text-right');
    container.insertBefore(divGroup, addButton);
}
</script>
@endsection