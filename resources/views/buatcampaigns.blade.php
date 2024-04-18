@extends('layouts.app')

@section('title', 'Tambah Campaign')

@section('content')
<div class="container mx-auto my-8 px-6 md:px-12">
<div id="additionalGoodsFields"></div>
    <div class="flex flex-wrap justify-center">
        <div class="w-full lg:w-8/12 px-4">
            <div class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-white shadow-lg">
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-700 text-sm font-bold">
                            Tambah Campaign
                        </h6>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-gray-500 text-sm mt-3 mb-6 font-bold uppercase">
                            Informasi Campaign
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignImage">
                                        Foto Campaign
                                    </label>
                                    <input type="file" id="campaignImage" name="image" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignName">
                                        Nama Campaign
                                    </label>
                                    <input type="text" id="campaignName" name="name" required class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="campaignDescription">
                                        Deskripsi Campaign
                                    </label>
                                    <textarea rows="4" id="campaignDescription" name="description" required class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150"></textarea>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="donationType">
                                        Jenis Sumbangan
                                    </label>
                                    <select id="donationType" name="donation_type" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" onchange="showDonationOptions()">
                                        <option value="">Pilih Jenis Sumbangan</option>
                                        <option value="money">Uang</option>
                                        <option value="goods">Barang</option>
                                        <option value="money_and_goods">Uang dan Barang</option>
                                    </select>
                                </div>
                            </div>
                            <div id="donationMoney" class="hidden w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="targetDonation">
                                        Target Donasi Uang
                                    </label>
                                    <input type="number" id="targetDonation" name="target_donation" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                                </div>
                            </div>
                            <div id="donationGoods" class="hidden w-full px-4">
                                <div id="goodsContainer" class="flex flex-wrap -mx-3 mb-6">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="targetGoods">
                                        Target Donasi Barang
                                    </label>
                                </div>
                                <div id="additionalGoodsFields"></div>
                                <div class="text-right">
                                    <button type="button" class="inline-block bg-blue-500 text-white active:bg-blue-600 text-sm font-bold uppercase px-3 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150" onclick="addGoodsField()">
                                        Tambah Barang
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-6">
                            <button class="bg-blue-500 text-white active:bg-blue-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection