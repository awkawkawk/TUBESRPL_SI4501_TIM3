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
        <div class="col-span-2 md:col-span-1">
            <div class="max-w-xl mx-auto p-5 bg-white rounded-lg shadow-md mt-4">
                <h2 class="text-xl font-semibold mb-2">Verifikasi Campaign "EduFund"</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Campaign</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="EduFund" disabled>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" disabled>Sebuah inisiatif untuk mendukung pendidikan melalui penggalangan dana.</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jumlah Dana yang Dibutuhkan</label>
                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="150000" disabled>
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" onclick="verifyCampaign()">Verifikasi</button>
            </div>
        </div>
    </div>

    <script>
        function verifyCampaign() {
            // Logika verifikasi bisa ditambahkan di sini, misalnya memanggil API
            alert('Campaign "EduFund" telah berhasil diverifikasi!');
        }
    </script>
@endsection
