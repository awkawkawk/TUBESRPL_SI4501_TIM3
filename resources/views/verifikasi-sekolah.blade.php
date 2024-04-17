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
                    @php
                        $schools = [
                            [
                                'profile' => 'img/Untitled-1.png',
                                'alt' => 'SMAN Arara 1',
                                'title' => 'SMAN Arara 1',
                                'username' => 'Arara',
                                'email' => 'arara@gmail.com',
                                'location' => 'Arara, Jawa Barat',
                                'schoolEmail' => 'arara@sman1arara.sch.id',
                                'schoolPhone' => '081234567890',
                                'registrantName' => 'John Doe',
                                'registrantEmail' => 'john@example.com',
                                'registrantNumber' => '0987654321',
                                'registrantIdentityNumber' => '1234567890',
                                'registrantProof' => 'Bukti Pendaftaran',
                            ],
                            [
                                'profile' => 'img/sample-riwayat.jpg',
                                'alt' => 'SMAN Semangat 2',
                                'title' => 'SMAN Semangat 2',
                                'username' => 'Semangat',
                                'email' => 'semangat@gmail.com',
                                'location' => 'Semangat, Jawa Barat',
                                'schoolEmail' => 'semangat@sman2semangat.sch.id',
                                'schoolPhone' => '081234567891',
                                'registrantName' => 'Jane Doe',
                                'registrantEmail' => 'jane@example.com',
                                'registrantNumber' => '1234567890',
                                'registrantIdentityNumber' => '0987654321',
                                'registrantProof' => 'Bukti Pendaftaran',
                            ],
                            [
                                'profile' => 'img/sample-riwayat.jpg',
                                'alt' => 'SMAN Semangat 2',
                                'title' => 'SMAN Semangat 2',
                                'username' => 'Semangat',
                                'email' => 'semangat@gmail.com',
                                'location' => 'Semangat, Jawa Barat',
                                'schoolEmail' => 'semangat@sman2semangat.sch.id',
                                'schoolPhone' => '081234567891',
                                'registrantName' => 'Jane Doe',
                                'registrantEmail' => 'jane@example.com',
                                'registrantNumber' => '1234567890',
                                'registrantIdentityNumber' => '0987654321',
                                'registrantProof' => 'Bukti Pendaftaran',
                            ],
                            [
                                'profile' => 'img/sample-riwayat.jpg',
                                'alt' => 'SMAN Semangat 2',
                                'title' => 'SMAN Semangat 2',
                                'username' => 'Semangat',
                                'email' => 'semangat@gmail.com',
                                'location' => 'Semangat, Jawa Barat',
                                'schoolEmail' => 'semangat@sman2semangat.sch.id',
                                'schoolPhone' => '081234567891',
                                'registrantName' => 'Jane Doe',
                                'registrantEmail' => 'jane@example.com',
                                'registrantNumber' => '1234567890',
                                'registrantIdentityNumber' => '0987654321',
                                'registrantProof' => 'Bukti Pendaftaran',
                            ],
                            [
                                'profile' => 'img/sample-riwayat.jpg',
                                'alt' => 'SMAN Semangat 2',
                                'title' => 'SMAN Semangat 2',
                                'username' => 'Semangat',
                                'email' => 'semangat@gmail.com',
                                'location' => 'Semangat, Jawa Barat',
                                'schoolEmail' => 'semangat@sman2semangat.sch.id',
                                'schoolPhone' => '081234567891',
                                'registrantName' => 'Jane Doe',
                                'registrantEmail' => 'jane@example.com',
                                'registrantNumber' => '1234567890',
                                'registrantIdentityNumber' => '0987654321',
                                'registrantProof' => 'Bukti Pendaftaran',
                            ],
                        ];
                    @endphp

                    @foreach ($schools as $school)
                        <x-admin-school-verification profile="{{ $school['profile'] }}" alt="{{ $school['alt'] }}"
                            idDetailSekolah="detailSekolah{{ $loop->iteration }}"
                            idDetailPendaftar="detailPendaftar{{ $loop->iteration }}"
                            verificationId="{{ $loop->iteration }}" title="{{ $school['title'] }}"
                            username="{{ $school['username'] }}" email="{{ $school['email'] }}"
                            location="{{ $school['location'] }}" schoolEmail="{{ $school['schoolEmail'] }}"
                            schoolPhone="{{ $school['schoolPhone'] }}" registrantName="{{ $school['registrantName'] }}"
                            registrantEmail="{{ $school['registrantEmail'] }}"
                            registrantNumber="{{ $school['registrantNumber'] }}"
                            registrantIdentityNumber="{{ $school['registrantIdentityNumber'] }}"
                            registrantProof="{{ $school['registrantProof'] }}" />
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
