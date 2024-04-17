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

        <div class="col-span-3 md:col-span-2">
            <div class="mb-4 text-left" style="margin-left: 2rem; margin-right: 2rem;">
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Verifikasi Sekolah</p>
                <div class="flex w-full flex-wrap">
                    @if ($schools->isEmpty())
                        <p class="m-8 w-full justify-center text-center text-sm">Sedang tidak ada sekolah yang perlu
                            diverifikasi</p>
                    @else
                        @foreach ($schools as $school)
                            <x-admin-school-verification profile="{{ $school['profile'] }}" alt="{{ $school['alt'] }}"
                                idDetailSekolah="detailSekolah{{ $loop->iteration }}"
                                idDetailPendaftar="detailPendaftar{{ $loop->iteration }}"
                                verificationId="{{ $loop->iteration }}" title="{{ $school['title'] }}"
                                schoolName="{{ $school['school_name'] }}" email="{{ $school['school_email'] }}"
                                location="{{ $school['school_address'] }}" schoolEmail="{{ $school['school_email'] }}"
                                schoolPhone="{{ $school['school_phone'] }}"
                                registrantName="{{ $school['registrant_name'] }}"
                                registrantEmail="{{ $school['registrant_email'] }}"
                                registrantNumber="{{ $school['registrant_number'] }}"
                                registrantIdentityNumber="{{ $school['registrant_identity_number'] }}"
                                registrantProof="{{ $school['registrant_proof'] }}" />
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    @endsection
