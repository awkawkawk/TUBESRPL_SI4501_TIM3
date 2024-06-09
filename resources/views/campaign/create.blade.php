@extends('layouts.master')

@section('title', 'Tambah Campaign')

@section('content')
<div class="container mx-auto my-8 px-6 md:px-6">
    <div class="md:col-span-1">
        <div class="text-left">
            <div class="flex items-center mb-4">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <a href="/" class="text-sm font-light text-gray-700 text-justify" style="margin-left: 8px;"><b>Kembali</b></a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-between">
        <div class="bg-white rounded-md shadow-md p-6 w-2/3">
            <form method="POST" action="{{ route('campaigns.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="w-full mt-4">
                    <div class="relative w-full mb-3">
                        <label class="block text-gray-700 text-base font-bold mb-2" for="tanggal_selesai">
                            Nama Campaign
                        </label>
                        <input type="text" id="nama_campaign" name="nama_campaign" required class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" placeholder="Input Nama Campaign">
                    </div>
                </div>

                <h2 class="text-base font-bold mb-4 text-gray-700 mt-4">Foto Campaign</h2>
                <div class="border-2 border-blue-500 border-dashed bg-blue-100 rounded-md p-8">
                    <div class="flex items-center justify-center mb-2 text-center">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 text-blue-100 icon" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 19V12M12 12L9.75 14.3333M12 12L14.25 14.3333M6.6 17.8333C4.61178 17.8333 3 16.1917 3 14.1667C3 12.498 4.09438 11.0897 5.59198 10.6457C5.65562 10.6268 5.7 10.5675 5.7 10.5C5.7 7.46243 8.11766 5 11.1 5C14.0823 5 16.5 7.46243 16.5 10.5C16.5 10.5582 16.5536 10.6014 16.6094 10.5887C16.8638 10.5306 17.1284 10.5 17.4 10.5C19.3882 10.5 21 12.1416 21 14.1667C21 16.1917 19.3882 17.8333 17.4 17.8333" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                        <label for="file-upload" class="text-gray-700 ml-2 text-center file-upload-label">Drag & drop files or <span class="text-blue-500 underline">Browse</span></label>
                        <input type="file" name="photo" id="file-upload" class="hidden">
                        <div class="hidden" id="image-preview">
                            <img id="preview-image" class="rounded-md">
                        </div>
                    </div>
                    <p id="supported-formats" class="text-gray-500 text-center text-sm file-upload-label">Supported formats: JPG, PNG, HEIC</p>
                </div>


                <div class="mt-4">
                    <label for="campaign-description" class="block text-gray-700 text-base font-bold mb-2">Deskripsi Campaign</label>
                    <textarea id="campaign-description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-none" rows="5"></textarea>
                </div>

                <div class="w-full mt-4">
                    <div class="relative w-full mb-3">
                        <label class="block text-base font-bold text-gray-700 mb-2" for="jenis_donasi">
                            Jenis Sumbangan
                        </label>
                        <select id="jenis_donasi" name="jenis_donasi" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
                            <option value="">Pilih Jenis Sumbangan</option>
                            <option value="uang">Uang</option>
                            <option value="barang">Barang</option>
                            <option value="uang_barang">Uang dan Barang</option>
                        </select>
                    </div>
                </div>

                <div id="target_uang" class="hidden w-full mt-4">
                    <div class="relative w-full mb-3">
                        <label class="block  text-gray-700 text-base font-bold mb-2" for="targetDonation">
                            Target Donasi Uang
                        </label>
                        <input type="number" id="target_uang" min="0" name="target_uang" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" placeholder="Input Nominal">
                    </div>
                </div>

                <div id="nama_barang" class="hidden w-full mt-4">
                    <div id="goodsContainer" class="flex flex-wrap -mx-3 mb-6">
                        <div class="px-3 mb-6 md:mb-0 w-1/2">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="nama_barang">
                                Nama Barang
                            </label>
                            <input type="text" name="jenis_barang[]" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" placeholder="Jenis Barang">
                        </div>
                        <div class="px-3 mb-6 md:mb-0 w-1/2">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="jumlah_barang">
                                Jumlah Barang
                            </label>
                            <input type="number" name="jumlah_barang[]" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150" placeholder="Jumlah Barang">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded shadow outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="addGoodsField()">
                            Tambah Barang
                        </button>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
        <div class="px-6 w-1/3">
            <h2 class="text-normal font-bold mb-4 text-gray-500">Riwayat Donasi Anda</h2>
            <div class="flex flex-wrap flex-col w-full">
                @foreach ($campaigns as $campaign)
                    <div class="flex w-full bg-white justify-between rounded-xl mb-4">
                        <div class="w-1/3">
                            <img src="{{ Storage::url($campaign->foto_campaign) }}" class="rounded-l-xl h-full object-cover" alt="Campaigan">
                        </div>
                        <div class="w-2/3 text-gray-600 p-2">
                            <h4 class="font-bold text-sm">{{ $campaign->nama_campaign }}</h4>
                            <p class="text-xs">{{ substr($campaign->deskripsi_campaign, 0, 30)}}</p>

                            <div class="w-full flex justify-between py-2">
                                <span class="text-xs">Terkumpul</span>
                                <span class="text-red-500 text-right text-xs font-bold">{{ $campaign->percentage_collected }}%</span>
                            </div>
                            <div class="w-full bg-gray-300 rounded-full h-1">
                                <div class="bg-red-500 h-full rounded-full" style="width: {{ $campaign->percentage_collected}}%;"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('file-upload');
    const previewImage = document.getElementById('preview-image');
    const jenisDonasi = document.getElementById('jenis_donasi');
    const imagePreview = document.getElementById('image-preview');
    const fileUploadLabel = document.querySelector('.file-upload-label');
    const fileUploadIcon = document.querySelector('.icon');
    const supportedFormats = document.getElementById('supported-formats');
    const dropArea = document.querySelector('.border-2');

    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            previewImage.src = event.target.result;
            imagePreview.classList.remove('hidden');
            fileUploadLabel.classList.add('hidden');
            fileUploadIcon.classList.add('hidden');
            supportedFormats.classList.add('hidden');
        };

        reader.readAsDataURL(file);
    });

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('bg-blue-200');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('bg-blue-200');
    });

    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        dropArea.classList.remove('bg-blue-200');

        const file = event.dataTransfer.files[0];
        const reader = new FileReader();

        reader.onload = (event) => {
            previewImage.src = event.target.result;
            imagePreview.classList.remove('hidden');
            fileUploadLabel.classList.add('hidden');
            fileUploadIcon.classList.add('hidden');
            supportedFormats.classList.add('hidden');
        };

        reader.readAsDataURL(file);
    });

    jenisDonasi.addEventListener('change', () => {
        console.log('test')
        showDonationOptions();
    });

    function showDonationOptions() {
        var donationType = document.getElementById("jenis_donasi").value;
        var donationMoney = document.getElementById("target_uang");
        var donationGoods = document.getElementById("nama_barang");

        donationMoney.style.display = "none";
        donationGoods.style.display = "none";

        if (donationType === "uang") {
            donationMoney.style.display = "block";
        } else if (donationType === "barang") {
            donationGoods.style.display = "block";
        } else if (donationType === "uang_barang") {
            donationMoney.style.display = "block";
            donationGoods.style.display = "block";
        }
    }

    function addGoodsField() {
        var goodsContainer = document.getElementById("goodsContainer");
        var newField = document.createElement("div");
        newField.classList.add("w-full","flex", "py-3", "mb-6", "md:mb-0", "items-center");
        newField.innerHTML = `
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input type="text" name="jenis_barang[]" placeholder="Jenis Barang" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <input type="number" name="jumlah_barang[]" placeholder="Jumlah Barang" class="border-0 px-3 py-3 rounded text-sm shadow focus:ring blue-500 focus:border-blue-500 w-full ease-linear transition-all duration-150">
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
