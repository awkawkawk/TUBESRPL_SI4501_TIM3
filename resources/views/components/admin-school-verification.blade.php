<div class="mb-8 w-1/2 pe-8" school-verification-id="{{ $verificationId }}">
    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
        <div class="flex items-center px-5 py-3">
            <img src="{{ asset($profile) }}" alt="{{ $alt }}" class="h-10 w-10 rounded-full object-cover">
            <div class="ml-4">
                <p class="font-bold text-black">{{ $schoolName }}</p>
                <p class="text-sm text-gray-600">{{ $email }}</p>
            </div>
        </div>
        <div class="inline-flex w-full rounded-md shadow-sm" role="group">
            <button type="button" id="btnDetailSekolah"
                class="w-1/2 border-b border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:font-bold focus:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Detail Sekolah
            </button>
            <button type="button" id="btnDetailPendaftar"
                class="w-1/2 border-b border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:font-bold focus:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Detail Pendaftar
            </button>
        </div>
        <div id="{{ $idDetailSekolah }}" class="h-48 overflow-y-auto p-5">
            <h3 class="mb-2 font-bold text-black">Detail Sekolah:</h3>
            <h4 class="text-sm font-bold text-black">Alamat:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $location }}</p>
            <h4 class="text-sm font-bold text-black">Email:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $schoolEmail }}</p>
            <h4 class="text-sm font-bold text-black">Nomor Telepon:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $schoolPhone }}</p>
        </div>
        <div id="{{ $idDetailPendaftar }}" class="hidden h-48 overflow-y-auto p-5">
            <h3 class="mb-2 font-bold text-black">Detail Pendaftar:</h3>
            <h4 class="text-sm font-bold text-black">Nama:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $registrantName }}</p>
            <h4 class="text-sm font-bold text-black">Email:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $registrantEmail }}</p>
            <h4 class="text-sm font-bold text-black">No Telepon:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $registrantNumber }}</p>
            <h4 class="text-sm font-bold text-black">No Identitas:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $registrantIdentityNumber }}</p>
            <h4 class="text-sm font-bold text-black">Bukti:</h4>
            <p class="mb-2 text-sm font-normal text-black text-wrap">{{ $registrantProof }}</p>
        </div>
        <div class="inline-flex w-full rounded-md shadow-sm" role="group">
            <button type="button"
                class="w-1/2 rounded-bl-lg border-gray-200 bg-green-600 px-4 py-3 text-sm font-medium text-white hover:bg-green-500 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Konfirmasi
            </button>
            <button type="button"
                class="w-1/2 rounded-br-lg bg-gray-400 border-gray-200 bg-white px-4 py-3 text-sm font-medium text-white hover:bg-red-600 hover:text-gray-100 focus:z-10 focus:text-blue-700 focus:ring-2 focus:ring-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:text-white dark:focus:ring-blue-500">
                Tolak
            </button>
        </div>
    </div>
</div>
