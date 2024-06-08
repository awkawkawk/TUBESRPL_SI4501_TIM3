@extends('layouts.master')

@section('content')
    <div class="w-full">

        <div class="grid h-fit w-full grid-flow-row">
            <div class="col-span-2 md:col-span-1">
                <div class="mt-4 text-left">
                    <div class="flex items-center mb-8">
                        <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none"
                            viewBox="0 0 14 10" style="margin-right: 8px;">
                            <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        <a href="/" class="text-sm font-light text-gray-700 text-justify"
                            style="margin-left: 8px;"><b>Kembali ke halaman utama</b></a>
                    </div>
                </div>
            </div>

        @foreach ($request as $d)
            <div class="flex mt-4 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex-1 flex justify-center items-center">
                    @unless ($d->MoneyDonation->Donation->Campaign->foto_campaign === null)
                        <img src="{{ asset('storage/cover_images/' . $d->MoneyDonation->Donation->Campaign->foto_campaign) }}"
                            alt="{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}" style="background-image: cover">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                            style="background-image: cover">
                    @endunless
                </div>
                <div class="flex-1 flex flex-col justify-center ml-4">
                    <p class="h1 mb-2 mt-2 block text-l font-bold text-black" >Nama Campaign</p>
                    <p class="h1 mb-1 block text-l font-normal text-black">{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}</p>
                    <h1></h1>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <p class="h1 mb-2 mt-2 block text-l font-bold text-black" >Donasi Terkumpul</p>
                    <p class="h1 mb-1 block text-l font-normal text-black">Rp.  {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}</p>
                </div>
                <div class="flex-1 flex flex-col justify-center items-center">
                    <p class="h1 mb-2 mt-2 block text-l font-bold text-black" >Sisa Donasi</p>
                    <p class="h1 mb-1 block text-l font-normal text-black">
                        Rp.
                        @if (is_null($d->id_tahap_pencairan))
                        {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}
                        @else
                        {{ number_format($d->nominal_sisa, 0, ',', '.') }}
                        @endif</p>
                </div>
                <div class="flex-1 flex justify-center items-center">
                    <a href="{{ route('pencairan.request', $d->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cairkan
                        Dana</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection