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
                    <a href="{{ url()->previous() }}" class="text-justify text-sm font-light text-gray-700"
                        style="margin-left: 8px;"><b>Kembali</b></a>
                </div>
            </div>
        </div>

        <div class="col-span-3 md:col-span-2">
            <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;">
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Verifikasi Campaign
                </p>
                <div class="flex flex-wrap">
                    {{-- {{$campaigns}} --}}
                    @if ($campaigns->isEmpty())
                        <p class="m-8 w-full justify-center text-center text-sm"><i>Sedang tidak ada campaign yang perlu
                                diverifikasi</i></p>
                    @else
                        <div class="flex w-full flex-wrap">
                            @foreach ($campaigns as $campaign)
                                <div class="flex w-1/2 p-2">
                                    <form action="{{ route('response.verification.campaign', $campaign['id']) }}"
                                        method="POST" class="w-full">
                                        @csrf
                                        @method('POST')
                                        <x-admin-campaign-verification profile="{{ $campaign->school->logo_sekolah }}"
                                            idDetailCampaign="detailSekolah{{ $loop->iteration }}"
                                            idDetailPermintaan="detailPendaftar{{ $loop->iteration }}"
                                            verificationId="{{ $loop->iteration }}" alt="{{ $campaign->nama_campaign }}"
                                            location="{{ $campaign->school->alamat_sekolah }}"
                                            campaignName="{{ $campaign->nama_campaign }}"
                                            school="{{ $campaign->school->nama_sekolah }}"
                                            descriptionCampaign="{{ $campaign->deskripsi_campaign }}"
                                            createdAt="{{ $campaign->created_at }}">
                                            @foreach ($campaign->targets as $target)
                                                <p class="text-wrap mb-2 text-sm font-normal text-black">
                                                    {{ $target->nama_barang }} : {{ $target->jumlah_barang }}</p>
                                            @endforeach
                                        </x-admin-campaign-verification>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection
