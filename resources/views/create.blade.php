@extends('layouts.master')

@section('title', 'Tambah Campaign')

@section('content')
    <div class="container mx-auto my-8 px-6 md:px-12">
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4 lg:w-8/12">
                <div class="relative flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-white shadow-lg">
                    <div class="mb-0 rounded-t px-6 py-6">
                        <div class="mb-3 text-center">
                            <h6 class="text-sm font-bold text-gray-700">
                                Tambah Campaign
                            </h6>
                        </div>
                        <hr class="border-b-1 mt-6 border-gray-300" />
                    </div>
                    <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                        <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 class="mb-6 mt-3 text-sm font-bold uppercase text-gray-500">
                                Informasi Campaign
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="foto_campaign">
                                            Foto Campaign
                                        </label>
                                        <input type="file" id="foto_campaign" name="foto_campaign"
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring">
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="nama_campaign">
                                            Nama Campaign
                                        </label>
                                        <input type="text" id="nama_campaign" name="nama_campaign" required
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring">
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="campaignDescription">
                                            Deskripsi Campaign
                                        </label>
                                        <textarea rows="4" id="deskripsi_campaign" name="deskripsi_campaign" required
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring"></textarea>
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="tanggal_dibuat">
                                            Tanggal Dibuat
                                        </label>
                                        <input type="date" id="tanggal_dibuat" name="tanggal_dibuat" required
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring">
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="tanggal_selesai">
                                            Tanggal Selesai
                                        </label>
                                        <input type="date" id="tanggal_selesai" name="tanggal_selesai" required
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring">
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="donationType">
                                            Jenis Sumbangan
                                        </label>
                                        <select id="jenis_donasi" name="jenis_donasi"
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring"
                                            onchange="showDonationOptions()">
                                            <option value="">Pilih Jenis Sumbangan</option>
                                            <option value="money">Uang</option>
                                            <option value="goods">Barang</option>
                                            <option value="money_and_goods">Uang dan Barang</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="target_uang" class="hidden w-full px-4">
                                    <div class="relative mb-3 w-full">
                                        <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                            for="targetDonation">
                                            Target Donasi Uang
                                        </label>
                                        <input type="number" id="target_uang" name="target_uang"
                                            class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring">
                                    </div>
                                </div>
                                <div id="nama_barang" class="hidden w-full px-4">
                                    <div id="goodsContainer" class="-mx-3 mb-6 flex flex-wrap">
                                        <div class="mb-6 w-full px-3 md:mb-0">
                                            <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                                for="nama_barang">
                                                Jenis Barang
                                            </label>
                                            <input type="text" name="nama_barang"
                                                class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring"
                                                placeholder="Jenis Barang">
                                        </div>
                                        <div class="mb-6 w-full px-3 md:mb-0">
                                            <label class="mb-2 block text-xs font-bold uppercase text-gray-700"
                                                for="jumlah_barang">
                                                Jumlah Barang
                                            </label>
                                            <input type="number" name="jumlah_barang"
                                                class="blue-500 w-full rounded border-0 px-3 py-3 text-sm shadow transition-all duration-150 ease-linear focus:border-blue-500 focus:ring"
                                                placeholder="Jumlah Barang">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="button"
                                            class="mb-1 mr-1 rounded bg-blue-500 px-3 py-1 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear focus:outline-none"
                                            onclick="addGoodsField()">
                                            Tambah Barang
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-center">
                                <button
                                    class="mb-1 mr-1 w-full rounded bg-blue-500 px-6 py-3 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none"
                                    type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showDonationOptions() {
            var donationType = document.getElementById("jenis_donasi").value;
            var donationMoney = document.getElementById("target_uang");
            var donationGoods = document.getElementById("nama_barang");

            donationMoney.style.display = "none";
            donationGoods.style.display = "none";

            if (donationType === "money") {
                donationMoney.style.display = "block";
            } else if (donationType === "goods") {
                donationGoods.style.display = "block";
            } else if (donationType === "money_and_goods") {
                donationMoney.style.display = "block";
                donationGoods.style.display = "block";
            }
        }

        function addGoodsField() {
            var goodsContainer = document.getElementById("goodsContainer");
            var newField = document.createElement("div");
            newField.classList.add("w-full", "px-3", "mb-6", "md:mb-0");
            newField.innerHTML = `
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input type="text" name="jenis_barang" placeholder="Jenis Barang" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input type="number" name="jumlah_barang" placeholder="Jumlah Barang" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
        </div>
        <div class="px-3">
            <button type="button" onclick="removeGoodsField(this)" class="bg-red-500 text-white text-sm font-bold uppercase px-3 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150">
                Hapus
            </button>
        </div>
    `;
            goodsContainer.appendChild(newField);
        }

        function removeGoodsField(button) {
            button.parentNode.parentNode.remove();
        }
    </script>
@endsection
