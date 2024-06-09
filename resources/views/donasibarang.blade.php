@extends('layouts.master')

@section('content')
    <div class="grid h-fit w-full grid-flow-row">
        <div class="md:col-span-1">
            <div class="mt-4 text-left">
                <div class="mb-4 flex items-center">
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

        <div class="md:col-span-1">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-lg sm:rounded-lg">
                    <p class="h1 mb-1 mt-2 block text-xl font-semibold text-black">{{ $selectedCampaign->nama_campaign }}
                    </p> <!-- Nama Campaign Yang Dipilih -->
                    <p class="text-s mb-2 font-normal text-black dark:text-gray-400">
                        {{ $selectedCampaign->school->nama_sekolah }}</p> <!-- Asal Sekolah -->
                    <hr>
                    <form method="POST" action="{{ route('donations.post.form.items', ['id' => $selectedCampaign->id]) }}"
                        style="margin: 0 auto;">
                        @csrf
                        <!-- Pilih Barang Yang Disumbangkan -->
                        <div class="mb-2 mt-6 flex flex-wrap">
                            <div class="w-full pr-1 md:w-3/6">
                                <label class="block text-sm font-medium text-gray-700" for="nama_barang">Barang
                                    Donasi</label>
                                <select
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    name="nama_barang[]" required>
                                    <option value="" disabled selected style="font-size: 14px;">Pilih Barang</option>
                                    @foreach ($targetDonasi as $target)
                                        <option value="{{ $target->nama_barang }}" style="font-size: 14px;">
                                            {{ $target->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Buat elemen untuk input jumlah barang -->
                            <div class="w-full pl-3 md:w-2/6">
                                <label class="block text-sm font-medium text-gray-700" for="jumlah_barang">Jumlah
                                    Barang</label>
                                <input style="font-size: 14px;"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    type="number" name="jumlah_barang[]" required>
                            </div>
                            <div class="mt-6 w-full pl-8 md:w-1/6">
                                <button onclick="addRow()" style="width: 42px; height: 42px;"
                                    class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">+</button>
                            </div>
                        </div>

                        <!-- Container untuk menambahkan baris baru -->
                        <div id="additionalRows"></div>

                        <!-- Input Jasa Kirim -->
                        <div class="mb-4 mt-6">
                            <label class="block text-sm font-medium text-gray-700" for="nama">Layanan Jasa Kirim</label>
                            <input style="font-size: 14px;"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                id="jasa_kirim" type="text" name="jasa_kirim" placeholder="Anda dapat mengisinya nanti">
                        </div>

                        <!-- Input Nomor Rekening -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="nomor_rekening">Nomor Resi
                                Pengiriman</label>
                            <input style="font-size: 14px;"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                id="nomor_resi" type="text" name="nomor_resi" placeholder="Anda dapat mengisinya nanti">
                        </div>

                        <!-- Input Pesan -->
                        <div class="mb-4 mt-6">
                            <label class="block text-sm font-medium text-gray-700" for="pesan">Pesan (Opsional)</label>
                            <textarea style="font-size: 14px;"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan anda..."></textarea>
                        </div>

                        <!-- Checkbox Syarat dan Ketentuan -->
                        <div class="mb-4 inline-flex items-center">
                            <label class="">
                                <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    type="checkbox" name="syarat_dan_ketentuan" required>
                                </label>
                                <span class="ms-2 text-sm text-gray-600">Saya menyetujui </span> <a class="ms-1 text-sm text-blue-500 cursor-pointer" data-modal-target="terms-modal"
                                        data-modal-toggle="terms-modal">syarat dan ketentuan</a>
                        </div>

                        <x-syarat-dan-ketentuan />

                        <!-- Button Lanjutkan Pembayaran -->
                        <button type="submit" class="bg-primary mt-2 w-full rounded-lg px-8 py-2 font-bold text-white">
                            Lanjutkan Donasi Anda
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function addRow() {
            // Buat elemen div baru untuk baris
            var newRow = document.createElement('div');
            newRow.classList.add('mb-2', 'flex', 'flex-wrap');

            // Buat elemen untuk pilihan barang donasi
            var selectContainer = document.createElement('div');
            selectContainer.classList.add('w-full', 'md:w-3/6', 'pr-1');
            selectContainer.innerHTML = `
            <label class="block font-medium text-sm text-gray-700" for="nama_barang">Barang Donasi</label>
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="nama_barang[]" required>
                <option value="" disabled selected style="font-size: 14px;">Pilih Barang</option>
                @foreach ($targetDonasi as $target)
                    <option value="{{ $target->nama_barang }}" style="font-size: 14px;">{{ $target->nama_barang }}</option>
                @endforeach
            </select>
        `;
            newRow.appendChild(selectContainer);

            // Buat elemen untuk input jumlah barang
            var inputContainer = document.createElement('div');
            inputContainer.classList.add('w-full', 'md:w-2/6', 'pl-3');
            inputContainer.innerHTML = `
        <label class="block font-medium text-sm text-gray-700" for="jumlah_barang">Jumlah Barang</label>
        <input style="font-size: 14px;" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="number" name="jumlah_barang[]" required>
        `;
            newRow.appendChild(inputContainer);

            // Buat elemen untuk tombol -
            var removeButtonContainer = document.createElement('div');
            removeButtonContainer.classList.add('w-full', 'md:w-1/6', 'pl-8', 'mt-1');
            removeButtonContainer.innerHTML = `
            <button onclick="removeRow(this)" style="width: 42px; height: 42px;" class="mt-5 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">-</button>
        `;
            newRow.appendChild(removeButtonContainer);

            // Tambahkan baris baru ke dalam container
            document.getElementById('additionalRows').appendChild(newRow);
        }

        function removeRow(button) {
            // Dapatkan elemen baris yang akan dihapus
            var rowToRemove = button.parentNode.parentNode;
            // Hapus elemen baris dari container
            rowToRemove.parentNode.removeChild(rowToRemove);
        }
    </script>
@endsection
