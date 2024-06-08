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
                <p class="h1 text-l mb-2 block font-semibold text-black" style="margin-bottom: 1rem;">Bukti Pelaporan:</p>
                <div class="flex flex-wrap gap-4">
                    @if ($campaigns->isEmpty())
                        <p>Tidak ada kampanye yang ditemukan.</p>
                    @else
                        @foreach ($campaigns as $campaign)
                            <x-campaign-card link="/campaign/detail/${campaign.id}" image-path="{{ $campaign->foto }}"
                                alt-text="{{ $campaign->nama_campaign }}" title="{{ $campaign->nama_campaign }}"
                                location="{{ $campaign->school->alamat_sekolah }}"
                                description="{{ $campaign->deskripsi_campaign }}">
                                <!-- Button to open modal -->
                                <button data-modal-target="uploadModal" data-modal-toggle="uploadModal"
                                    class="btn flex w-full items-center justify-center rounded-lg bg-gray-800 py-2 text-sm text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="mr-2 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                    </svg>
                                    Upload Image
                                </button>


                                <!-- Modal -->
                                <div id="uploadModal" tabindex="-1" aria-hidden="true"
                                    class="h-modal fixed left-0 right-0 top-0 z-50 hidden h-full w-full overflow-y-auto overflow-x-hidden p-4">
                                    <div class="relative h-full w-full max-w-2xl md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Upload Image
                                                </h3>
                                                <button type="button"
                                                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="uploadModal">
                                                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="space-y-6 p-6">
                                                <form id="uploadForm">
                                                    <label
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                                        for="file_input">Upload file</label>
                                                    <input
                                                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                                        id="file_input" type="file" accept="image/*">
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                                                <button type="submit" form="uploadForm"
                                                    class="btn w-full rounded-lg bg-gray-800 py-2 text-white">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-campaign-card>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    @endsection
