@extends('layouts.master')

@section('content')
    <div class="w-full">
        @if ($request->isEmpty())
            <p class="align-center justify-center text-center">Tidak ada data yang perlu dicairkan.</p>
        @else
            @foreach ($request as $d)
                <div class="mt-6 flex overflow-hidden bg-white px-6 py-4 shadow-md sm:rounded-lg">
                    <div class="flex flex-1 items-center justify-center">
                        @unless ($d->MoneyDonation->Donation->Campaign->foto_campaign === null)
                            <img class="rounded-lg" src="{{ $d->MoneyDonation->Donation->Campaign->foto_campaign }}"
                                alt="{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}" style="background-image: cover">
                        @else
                            <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                                style="background-image: cover">
                        @endunless
                    </div>
                    <div class="ml-2 flex flex-1 flex-col justify-center">
                        <h1>Nama Campaign</h1>
                        <h1>{{ $d->MoneyDonation->Donation->Campaign->nama_campaign }}</h1>
                    </div>
                    <div class="flex flex-1 flex-col items-center justify-center">
                        <h3>Kuota Pencairan</h3>
                        <h3>Rp.
                            @if ($d->nominal_sisa == 0)
                                {{ number_format($d->nominal_terkumpul, 0, ',', '.') }}
                            @else
                                {{ number_format($d->nominal_sisa, 0, ',', '.') }}
                            @endif
                        </h3>
                    </div>
                    <div class="flex flex-1 flex-col items-center justify-center">
                        <h3>Pencairan</h3>
                        {{-- {{$d->historyPencairan}} --}}
                        @php
                            $latestHistory = $d->historyPencairan()->latest()->first();
                        @endphp

                        @if ($latestHistory)
                            <h3>Rp. {{ number_format($latestHistory->nominal_pencairan, 0, ',', '.') }}</h3>
                        @else
                            <p>Belum ada riwayat pencairan.</p>
                        @endif
                    </div>

                    <div class="flex flex-1 items-center justify-center">
                        <!-- Tombol untuk membuka modal -->
                        @if ($d->id_tahap_pencairan == null)
                            <button class="disabled rounded bg-gray-500 px-4 py-2 font-bold text-white"
                                disabled>Pending</button>
                        @elseif ($d->status === 'pending')
                            <a id="cairkan-dana" name="cairkan-dana" class="cursor-pointer rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                                data-modal-target="transferModal" data-modal-toggle="transferModal">Cairkan Dana</a>
                        @else
                            <a id="cairkan-dana" name="cairkan-dana" class="cursor-pointer rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                                data-modal-target="transferModal" data-modal-toggle="transferModal">Cairkan Dana</a>
                        @endif

                        <!-- Modal -->
                        <div id="transferModal" tabindex="-1" aria-hidden="true"
                            class="h-modal fixed left-0 right-0 top-0 z-50 hidden w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full">
                            <div class="relative h-full w-full max-w-md md:h-auto">
                                <!-- Modal content -->
                                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Upload Bukti Transfer
                                        </h3>
                                        <button type="button"
                                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="transferModal">
                                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>


                                    </div>
                                    <!-- Modal body -->
                                    <div class="space-y-12 p-6">
                                        @foreach ($d->historyPencairan as $history)
                                            <form id="uploadForm"
                                                action="{{ route('pencairan.response', ['RequestPencairan' => $d->id, 'History' => $history->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="pendukung"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload
                                                        Bukti Transfer</label>
                                                    <input type="file" name="pendukung" id="pendukung"
                                                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400">
                                                </div>
                                                <button type="submit" id="submit" name="submit"
                                                    class="focus:shadow-outline w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none">Submit</button>
                                            </form>
                                        @endforeach
                                    </div>
                                    <!-- Modal footer -->

                                    <div
                                        class="flex items-center justify-end rounded-b border-t border-gray-200 p-4 dark:border-gray-600">
                                        <button type="button"
                                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="transferModal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
    </div>
    @endif
@endsection


