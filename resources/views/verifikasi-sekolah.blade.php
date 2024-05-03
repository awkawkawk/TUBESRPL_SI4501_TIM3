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
                        <p class="m-8 w-full justify-center text-center text-sm"><i>Sedang tidak ada sekolah yang perlu
                                diverifikasi</i></p>
                    @else
                        @foreach ($schools as $school)
                            <form action="{{ route('response.verification', $school['id']) }}" method="POST"
                                class="flex w-full">
                                @csrf
                                @method('POST')
                                <x-admin-school-verification profile="{{ $school['logo_sekolah'] }}"
                                    alt="{{ $school['nama_sekolah'] }}"
                                    idDetailSekolah="detailSekolah{{ $loop->iteration }}"
                                    idDetailPendaftar="detailPendaftar{{ $loop->iteration }}"
                                    verificationId="{{ $loop->iteration }}" title="{{ $school['nama_sekolah'] }}"
                                    desc="{{ $school['alamat_sekolah'] }}" location="{{ $school['alamat_sekolah'] }}"
                                    schoolEmail="{{ $school['email_sekolah'] }}"
                                    schoolPhone="{{ $school['no_telepon_sekolah'] }}"
                                    registrantName="{{ $school['nama_pendaftar'] }}"
                                    registrantEmail="{{ $school['email_pendaftar'] }}"
                                    registrantNumber="{{ $school['no_hp_pendaftar'] }}"
                                    registrantIdentityNumber="{{ $school['identitas_pendaftar'] }}"
                                    registrantProof="{{ $school['bukti_id_pendaftar'] }}" />

                        @endforeach
                    @endif
</form>
                </div>
            </div>
        </div>
    @endsection
