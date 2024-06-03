@extends('layouts.app')

@section('title', 'Edit Campaign')

@section('content')
<div class="container mx-auto my-8 px-6 md:px-6">
    <div class="md:col-span-1">
        <div class="text-left">
            <div class="flex items-center mb-4">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali</b></a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap">
        @foreach ($donations as $donate)
        <div class="w-full flex justify-evenly bg-white rounded-xl mb-3">
            <div class="w-3/6 flex justify-start">
                <img src="{{ Storage::url($donate->campaign->foto_campaign) }}" class="w-52 rounded-l-xl" alt="Campaign">
                <div class="px-4 py-5">
                    <h1 class="font-bold text-xl">{{ $donate->campaign->nama_campaign }}</h1>
                    <p class="italic">{{ substr($donate->campaign->deskripsi_campaign,0,20) }}</p>
                    <p>{{ date('d M Y', strtotime($donate->campaign->tanggal_mulai)) }}</p>
                </div>
            </div>
            <div class="w-2/6">
                <p class="text-xs py-2">Sumbangan Berupa :</p>
                <div class="w-full flex flex-wrap">
                    @foreach ($donate->donationItems as $item)
                        <div class="w-1/2 flex justify-start items-center py-1">
                            <svg viewBox="0 0 24 24" class="h-5 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect width="24" height="24" fill="white"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path>
                                </g><
                            </svg>


                            <span class="px-2 font-bold text-xs">{{  $item->jumlah_barang .' ' .$item->nama_barang }}</span>

                        </div>
                    @endforeach

                    @if($donate->donationMoney)
                        @foreach ($donate->donationMoney as $row)

                        <div class="w-1/2 flex justify-start items-center py-1">
                            <svg viewBox="0 0 24 24" class="h-5 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect width="24" height="24" fill="white"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path>
                                </g><
                            </svg>

                            <span class="px-2 font-bold text-xs">Rp {{  number_format($row->nominal,0,',','.') }},-</span>

                        </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="w-1/6 flex items-center justify-center px-5">
                <p class="
                    block text-white px-5 py-2 rounded-md
                    @if($donate->status == 'pending') bg-gray-700
                    @elseif($donate->status == 'berhasil') bg-green-700
                    @elseif($donate->status == 'gaggal') bg-red-500
                    @else bg-gray-700
                    @endif
                ">
                    {{ $donate->status ? $donate->status : "PENDING"}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
