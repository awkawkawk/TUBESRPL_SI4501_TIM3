@extends('layouts.app')

@section('title', 'Tambah Campaign')

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


    <div class="w-full p-5">
        <h1 class="text-gray-400 font-bold">Manage Campaign</h1>
    </div>
    <div class="flex flex-wrap justify-between">
        @php
            // print_r($campaigns);
        @endphp
        @foreach ($campaigns as $campaign)
        <div class="w-1/3 px-5">
            <div class="relative w-full max-w-lg min-h-[750px] rounded-3xl">
                <img src="{{ Storage::url($campaign->foto_campaign) }}" alt="Sample Image" class="absolute inset-0 w-full min-h-600 rounded-t-3xl object-cover z-10">

                <div class="absolute inset-0 flex flex-col items-center justify-end bg-white bg-opacity-0 min-h-[800px]  z-20 text-center">
                    <!-- Your content goes here -->
                    <div class="p-5 bg-white rounded-3xl w-full text-left min-h-[620px]">
                        <h3 class="font-bold text-xl block w-full">{{ $campaign->nama_campaign}}</h3>
                        <p class="italic">Arara, Jawa Barat</p>

                        <p class="text-sm py-5">{{ $campaign->deskripsi_campaign }}</p>
                        <div class="w-full flex justify-between pb-2">
                            <span>Terkumpul</span>
                            <span class="text-red-500 text-right font-bold">{{ $campaign->percentage_collected }}%</span>
                        </div>
                        <div class="w-full bg-gray-300 rounded-full h-2">
                            <div class="bg-red-500 h-full rounded-full" style="width: {{ $campaign->percentage_collected}}%;"></div>
                        </div>

                        <p class="py-5 font-bold">Detail Kebutuhan</p>

                        <div class="w-full min-h-[250px]">
                            @if($campaign->targets->type == 'money' || $campaign->targets->type == 'money_and_goods')
                            <p class="pb-1">Dana</p>
                            <div class="flex justify-between w-full">
                                <div class="w-1/2 flex justify-start items-center">
                                    <svg viewBox="0 0 24 24" class="h-5 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="24" height="24" fill="white"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path>
                                        </g><
                                    </svg>
                                    <span class="px-2 font-bold text-sm">Rp 0,-</span>
                                </div>

                                <div class="w-1/2 flex justify-start items-center">
                                    <svg viewBox="0 0 24 24" class="h-5 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="24" height="24" fill="white"></rect>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M384,283.429H128v-54.857 h256V283.429z" fill="currentColor"></path>
                                        </g>
                                    </svg>
                                    <svg class="h-4 text-red-700"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    <path d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M384,283.429H128v-54.857 h256V283.429z" fill="currentColor"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="px-2 font-bold text-sm">Rp {{ number_format($campaign->targets->money_amount,0,',','.') }},-</span>
                                </div>
                            </div>
                            @endif
                            @if($campaign->targets->type == 'goods' || $campaign->targets->type == 'money_and_goods')
                            <div class="w-full mt-5">
                                <p class="pb-1">Barang</p>
                                @foreach(json_decode($campaign->targets->goods, true) as $good)
                                <div class="flex justify-between w-full py-1">
                                    <div class="w-1/2 flex justify-start items-center">
                                        <svg viewBox="0 0 24 24" class="h-5 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <rect width="24" height="24" fill="white"></rect>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path>
                                            </g><
                                        </svg>
                                        <span class="px-2 text-sm"><strong>0</strong> {{ $good['name'] }}</span>
                                    </div>

                                    <div class="w-1/2 flex justify-start items-center">
                                        <svg viewBox="0 0 24 24" class="h-4 text-green-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <rect width="24" height="24" fill="white"></rect>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M384,283.429H128v-54.857 h256V283.429z" fill="currentColor"></path>
                                            </g>
                                        </svg>
                                        <svg class="h-4 text-red-700"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <rect width="24" height="24" fill="white"></rect>
                                                        <path d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M384,283.429H128v-54.857 h256V283.429z" fill="currentColor"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="px-2 text-sm"><strong>{{ $good['quantity'] }}</strong> {{ $good['name'] }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="block w-full bg-red-500 rounded-lg py-2 my-2 text-center text-white font-bold">Edit</a>
                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-800 hover:bg-red-700 rounded-lg py-2 my-1 text-center text-white font-bold">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
