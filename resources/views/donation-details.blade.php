@extends('layouts.master')

@section('content')
    <div class="grid h-fit w-full grid-flow-row">
        <div class="col-span-2 md:col-span-1">
            <div class="mt-4 text-left">
                <div class="mb-8 flex items-center">
                    <svg class="mr-2 h-4 w-4 text-gray-800 dark:text-white" aria-hidden="true" fill="none"
                        viewBox="0 0 14 10" style="margin-right: 8px;">
                        <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    <a href="/" class="text-justify text-sm font-light text-gray-700"
                        style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
                </div>
            </div>
        </div>

        <div class="">
            <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;">
                {{-- <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Details</p> --}}
                <div class="flex w-full">
                    <div class="flex flex-wrap col-span-1 w-2/3 h-fit">
                        <div class="rounded-lg border border-gray-200 bg-white flex">
                            @foreach ($details as $detail)
                                <div class="w-1/2">
                                    <img class="h-full rounded-lg object-cover" src="{{ asset('img/Untitled-1.png') }}"
                                        alt="">
                                </div>
                                <div class="w-1/2 p-4">
                                    <div>
                                        <p class="text-xl font-bold text-black">{{ $detail->nama_campaign }}</p>
                                        <p class="mb-2 font-normal text-black">{{ $detail->school->nama_sekolah }}
                                            <i>({{ $detail->school->alamat_sekolah }})</i>
                                        </p>
                                        <p class="mb-2 text-sm font-normal text-black">{{ $detail->deskripsi_campaign }}</p>
                                        <p class="mb-2 mt-4 text-sm font-normal text-black">Detail Kebutuhan:</p>
                                        @foreach ($detail->targets as $target)
                                            <div>
                                                <p class="inline-flex text-sm font-semibold">{{ $target->nama_barang }}</p> : <p
                                                    class="inline-flex text-sm font-normal">{{ $target->jumlah_barang }}</p>
                                            </div>
                                        @endforeach
                                        <div class="mb-1 mt-4 flex w-full text-sm font-medium">
                                            <p>Terkumpul</p>
                                            <p class="text-primary ms-auto font-bold">20%</p>
                                        </div>
                                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                                            <div class="bg-primary h-1.5 rounded-full" style="width: 20%;">
                                            </div>
                                        </div>

                                        <div class="flex justify-center items-center mt-4">
                                            <a href="{{ route('donations.form', ['id' => $detail->id]) }}"
                                                class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                                                Donasi Uang
                                            </a>
                                        </div>

                                        <div class="flex justify-center items-center mt-4">
                                            <a href="{{ route('donations.form.items', ['id' => $detail->id]) }}"
                                                class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                                                Donasi Barang
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="container mt-4 p-4 rounded-lg border border-gray-200 bg-white w-full">
                            <div class=" flex">
                                <img src="https://th.bing.com/th/id/OIP.5zo7tOSILLwpx1s_73fTNwHaJQ?rs=1&pid=ImgDetMain" class="my-auto me-4 h-16 w-16 object-cover rounded-full" alt="User Image">
                                <div class="">
                                    <h5 class="">Robert</h5>
                                    <h6 class="">10 Januari 2024</h6>
                                    <p class="">Semoga siswa-siswa yang belajar tetap kuat dan semangat dalam
                                        menimba ilmu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 ps-4">
                        <p class="pb-4">Campaign dari sekolah ini:</p>
                        @foreach ($otherDetails as $index => $other)
                            @if ($index < 4)
                                <div class="mb-4 flex rounded-lg border border-gray-200 bg-white">
                                    <div class="w-1/3">
                                        <img class="h-full w-full rounded-lg object-cover"
                                            src="{{ asset('img/Untitled-1.png') }}" alt="">
                                    </div>
                                    <div class="w-2/3 p-4">
                                        <p class="font-bold text-black">{{ $other->nama_campaign }}</p>
                                        <p class="mb-2 text-sm font-normal text-black">{{ $other->school->nama_sekolah }}
                                            <i>({{ $other->school->alamat_sekolah }})</i>
                                        </p>
                                        <div class="mb-1 mt-4 flex w-full text-sm font-medium">
                                            <p>Terkumpul</p>
                                            <p class="ms-auto font-bold text-gray-800">20%</p>
                                        </div>
                                        <div class="h-1.5 w-full rounded-full bg-gray-200">
                                            <div class="h-1.5 rounded-full bg-gray-800" style="width: 20%;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
