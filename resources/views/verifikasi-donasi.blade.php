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
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Verifikasi Donasi</p>
                <div class="flex w-full flex-wrap">
                    @if ($donations->isEmpty())
                        <p class="m-8 w-full justify-center text-center text-sm"><i>Sedang tidak ada donasi yang perlu
                                diverifikasi</i></p>
                    @else
                        @foreach ($donations as $donation)
                            <form action="{{ route('response.verification.donation', $donation['id']) }}" method="POST"
                                class="flex flex-wrap">
                                @csrf
                                @method('POST')
                                <div class="mb-8 w-96 pe-8">
                                    <img src="{{ $donation->campaign->foto_campaign }}"
                                        alt="{{ $donation->campaign->nama_campaign }}"
                                        class="h-64 w-full rounded-t-lg object-cover" referrerpolicy="no-referrer">
                                    <div class="bg-white shadow-sm">
                                        <div class="w-full items-center px-5 py-3">
                                            <div class="mb-2 flex border-b border-gray-500 pb-2 text-center">
                                                <p class="text-wrap mr-auto text-xs font-normal text-black">
                                                    {{ ucfirst($donation->jenis_donasi) }}</p>
                                                <p class="text-wrap text-xs font-normal text-black">
                                                    {{ $donation->created_at }}</p>
                                            </div>
                                            <p class="font-bold text-black">{{ $donation->campaign->nama_campaign }}</p>
                                            <p class="text-sm text-gray-600">
                                                {{ $donation->campaign->school->nama_sekolah }}</p>
                                        </div>
                                        <div class="h-48 overflow-y-auto px-5">
                                            @if (ucfirst($donation->jenis_donasi) === 'Uang')
                                                <h4 class="text-sm font-bold text-black">Pembayaran:</h4>
                                                @foreach ($donation->moneyDonations as $moneyDonation)
                                                    <p class="text-wrap text-sm font-normal text-black">
                                                        {{ $moneyDonation['nama_bank'] }} -
                                                        {{ $moneyDonation['nomor_rekening'] }}</p>
                                                    <div>
                                                        <p class="h1 mb-2 block text-sm font-semibold text-black"
                                                            style="margin-top:5px">Donasi Tersalurkan</p>
                                                        <div class="card mb-2">
                                                            <div class="card-body">
                                                                <p
                                                                    class="mb-1 flex items-center text-sm font-normal text-black dark:text-gray-400">
                                                                    <svg class="mr-2 h-5 w-5 text-green-500" fill="none"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke="none">
                                                                        <circle cx="12" cy="12" r="10"
                                                                            fill="#42BB4E" />
                                                                        <path d="M9 12l2 2l4 -4" stroke="white"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span class="mr-1">Uang</span>

                                                                    <span>
                                                                        Rp.
                                                                        {{ number_format($moneyDonation['nominal'], 0, ',', '.') }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h4 class="text-sm font-bold text-black">Pengiriman:</h4>
                                                <p class="text-wrap text-sm font-normal text-black">
                                                    {{ $donation->jasa_kirim }} - {{ $donation->nomor_resi }}</p>

                                                <div>
                                                    <p class="h1 mb-2 block text-sm font-semibold text-black"
                                                        style="margin-top:5px">Donasi Tersalurkan</p>
                                                    <div class="card mb-2">
                                                        <div class="card-body">
                                                            @foreach ($donation->donationItems as $donationItem)
                                                                <p
                                                                    class="mb-1 flex items-center text-sm font-normal text-black dark:text-gray-400">
                                                                    <svg class="mr-2 h-5 w-5 text-green-500" fill="none"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke="none">
                                                                        <circle cx="12" cy="12" r="10"
                                                                            fill="#42BB4E" />
                                                                        <path d="M9 12l2 2l4 -4" stroke="white"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                    <span
                                                                        class="mr-1">{{ $donationItem['nama_barang'] }}</span>

                                                                    <span>
                                                                        @if ($donationItem['nama_barang'] == 'Uang')
                                                                            Rp.
                                                                            {{ number_format($donationItem['jumlah_barang'], 0, ',', '.') }}
                                                                        @else
                                                                            {{ number_format($donationItem['jumlah_barang'], 0, ',', '.') }}
                                                                        @endif
                                                                    </span>
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- <h4 class="text-sm font-bold text-black">Nomor Telepon:</h4>
                                            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $schoolPhone }}</p> --}}
                                        </div>
                                        <div class="inline-flex w-full rounded-md shadow-sm" role="group">
                                            <button type="button" data-modal-target="confirm-modal{{ $donation['id'] }}"
                                                data-modal-toggle="confirm-modal{{ $donation['id'] }}"
                                                class="w-1/2 rounded-bl-lg border-gray-200 bg-green-600 px-4 py-3 text-sm font-medium text-white hover:bg-green-800 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                                                Konfirmasi
                                            </button>

                                            <button type="button" data-modal-target="decline-modal{{ $donation['id'] }}"
                                                data-modal-toggle="decline-modal{{ $donation['id'] }}"
                                                class="w-1/2 rounded-br-lg border-gray-200 bg-red-600 px-4 py-3 text-sm font-medium text-white hover:bg-red-800 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Confirm modal -->
                                <div id="confirm-modal{{ $donation['id'] }}" tabindex="-1" aria-hidden="true"
                                    class="top-50 fixed left-0 right-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                    <div class="relative max-h-full w-full max-w-2xl p-4">
                                        <!-- Modal content -->
                                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                                    Konfirmasi {{ $donation->user->nama }}
                                                </h3>
                                                <button type="button"
                                                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="confirm-modal{{ $donation['id'] }}">
                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="space-y-4 p-4 md:p-5">
                                                <p
                                                    class="text-base font-semibold leading-relaxed text-gray-900 dark:text-gray-400">
                                                    Apakah anda yakin ingin mengkonfirmasi {{ $donation->user->nama }}?
                                                </p>
                                                <p class="text-gray-00 text-sm leading-relaxed dark:text-gray-400">
                                                    Dengan menekan tombol iya maka anda yakin bahwa
                                                    {{ $donation->user->nama }} telah menyertakan
                                                    bukti
                                                    yang valid dan sesuai dengan ketentuan yang berlaku!
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                                                <button type="submit" name="response" value="confirm"
                                                    class="rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ya,
                                                    saya yakin</button>
                                                <button data-modal-hide="confirm-modal{{ $donation['id'] }}"
                                                    type="button"
                                                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Decline modal -->
                                <div id="decline-modal{{ $donation['id'] }}" tabindex="-1" aria-hidden="true"
                                    class="top-50 fixed left-0 right-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                    <div class="relative max-h-full w-full max-w-2xl p-4">
                                        <!-- Modal content -->
                                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                                    Tolak {{ $donation->user->nama }}
                                                </h3>
                                                <button type="button"
                                                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="decline-modal{{ $donation['id'] }}">
                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="space-y-4 p-4 md:p-5">
                                                <p
                                                    class="text-base font-semibold leading-relaxed text-gray-900 dark:text-gray-400">
                                                    Apakah anda yakin ingin menolak {{ $donation->user->nama }}?
                                                </p>
                                                <p class="text-gray-00 text-sm leading-relaxed dark:text-gray-400">
                                                    Dengan menekan tombol iya maka anda yakin bahwa
                                                    {{ $donation->user->nama }} tidak menyertakan
                                                    bukti
                                                    yang valid dan sesuai dengan ketentuan yang berlaku!
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">

                                                <button type="submit" name="response" value="decline"
                                                    class="rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ya,
                                                    tolak</button>

                                                <button data-modal-hide="decline-modal{{ $donation['id'] }}"
                                                    type="button"
                                                    class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

    @endsection
