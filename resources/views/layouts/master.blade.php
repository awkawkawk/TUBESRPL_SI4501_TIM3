 <!DOCTYPE html>

 <html lang="id">

 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>EduFund</title>
     @vite(['public/css/app.css', 'resources/js/app.js'])
     <link rel="icon" type="image/png" href="{{ asset('assets/img/miniLogo.png') }}">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
         rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     <link rel="stylesheet" href="{{ asset('css/icofont/icofont.min.css') }}">

 </head>

 <body>

     <nav class="fixed top-0 z-50 w-full bg-white">
         <div class="px-3 py-3 lg:px-5 lg:pl-3">
             <div class="flex items-center">
                 <div class="flex items-center justify-start rtl:justify-end">
                     <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                         aria-controls="logo-sidebar" type="button"
                         class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden">
                         <span class="sr-only">Buka sidebar</span>
                         <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path clip-rule="evenodd" fill-rule="evenodd"
                                 d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                             </path>
                         </svg>
                     </button>

                     {{-- Logo --}}
                     <a href="/" class="ms-2 flex md:me-24">
                         <img src="{{ asset('assets/img/EduFundv2-text.png') }}" class="ms-6 h-14" alt="EduFund" />
                         <span class="self-center whitespace-nowrap text-xl font-semibold sm:text-2xl"></span>
                     </a>
                 </div>

                 {{-- Pencarian --}}
                 <form action="{{ route('search.result') }}" method="GET">
                     @csrf
                     <div class="flex pl-6 md:order-1">
                         <div class="relative hidden w-96 md:block">
                             <input type="text" id="search-navbar"
                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-4 text-sm text-gray-900 focus:border-gray-500 focus:ring-0"
                                 placeholder="Cari..." name="keyword" value="{{ $query ?? '' }}">
                             <button type="submit"
                                 class="absolute inset-y-0 end-4 flex cursor-pointer items-center ps-3">
                                 <svg class="h-4 w-4 text-gray-500" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                 </svg>
                                 <span class="sr-only">Ikon pencarian</span>
                             </button>
                             <button type="submit" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                                 aria-expanded="false"
                                 class="focus:ring- me-1 rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-gray-200 md:hidden">
                                 <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 20 20">
                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                 </svg>
                                 <span class="sr-only">Cari</span>
                             </button>
                         </div>


                         <button data-collapse-toggle="navbar-search" type="button"
                             class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
                             aria-controls="navbar-search" aria-expanded="false">
                             <span class="sr-only">Buka menu utama</span>
                             <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 17 14">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                             </svg>
                         </button>
                 </form>
             </div>

             {{-- Tombol --}}
             @auth
                 <div class="ms-auto hidden w-full items-center justify-between md:order-2 md:flex md:w-auto"
                     id="navbar-search">
                     <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300"
                         aria-expanded="false" data-dropdown-toggle="dropdown-user">
                         <span class="sr-only">Buka menu pengguna</span>
                         <!-- {{ Auth::user()->profile_picture }} -->
                         <img class="h-8 w-8 rounded-full object-cover"
                             src="{{ Auth::user()->profile_picture ? Auth::user()->profile_picture : asset('assets/img/default_profile_picture.jpg') }}"
                             referrerpolicy="no-referrer" alt="foto pengguna">
                     </button>
                 </div>
                 <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow"
                     id="dropdown-user">
                     <div class="px-4 py-3" role="none">
                         <p class="text-sm text-gray-900" role="none">
                             {{ Auth::user()->nama }}
                         </p>
                         <p class="truncate text-sm font-medium text-gray-900" role="none">
                             {{ Auth::user()->email }}
                         </p>
                     </div>
                     <ul class="py-1" role="none">
                         <li>
                             <a href="{{ route('profile.edit') }}"
                                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                 role="menuitem">Profil</a>
                         </li>
                         {{-- <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Pengaturan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Pendapatan</a>
                            </li> --}}
                         <li>
                             <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                 role="menuitem"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                             <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                 style="display: none;">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </div>
             @else
                 <a href="{{ route('login') }}"
                     class="ms-auto rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-2">
                     Masuk
                 </a>

                 @if (Route::has('register'))
                     <a href="{{ route('register') }}"
                         class="rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-3">
                         Daftar
                     </a>
                 @endif
             @endauth

         </div>
         </div>
     </nav>

    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-52 -translate-x-full bg-white pt-20 transition-transform md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-white px-3 pb-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-4 w-4 text-gray-500 transition duration-75 group-hover:text-gray-900">
                            <path
                                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path
                                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>


                        <span class="ms-3 text-sm">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-4 w-4 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Cari</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('campaign.riwayat') }}" class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                        <svg class="h-4 w-4 text-zinc-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="12 8 12 12 14 14" />
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                        <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Riwayat Campaign</span>
                    </a>
                </li>

                         <li>
                             <a href="{{ route('list.pencairan') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Pencairan Dana</span>
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('pencairan.history') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" />
                                     <rect x="3" y="4" width="18" height="4" rx="2" />
                                     <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                     <line x1="10" y1="12" x2="14" y2="12" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Riwayat Pencairan</span>
                             </a>
                         </li>
                     @endif
                 @endauth

                 @auth
                     @if (Auth::user()->tipe_user == 'admin')
                         <li>
                             <a href="{{ route('dashboard_edufund') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none"stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" />
                                     <path
                                         d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-3.8a4.1 4.1 0 1 1 -5 -5v-4a.9 .9 0 0 0 -1 -.8" />
                                     <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a9 9 0 0 0 -1 -1v-4.5" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Dashboard</span>
                             </a>
                         </li>
                         <li>
                             <a href="#"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="h-4 w-4 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900">
                                     <path fill-rule="evenodd"
                                         d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                         clip-rule="evenodd" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Cari</span>
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('donationMoney.edit') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                 </svg>

                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Manage Donasi</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('verifikasi.campaign') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-800 hover:bg-gray-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-4">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Manage Donatur</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('verifikasi.campaign') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-800 hover:bg-gray-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-4">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                                 </svg>


                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Manage Sekolah</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('admin.list.pencairan') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Pencairan Dana</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('pencairan.history.admin') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" />
                                     <rect x="3" y="4" width="18" height="4" rx="2" />
                                     <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                     <line x1="10" y1="12" x2="14" y2="12" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Riwayat Pencairan</span>
                             </a>
                         </li>
                         <li>
                             <a href="{{ route('verifikasi.sekolah') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" />
                                     <line x1="3" y1="21" x2="21" y2="21" />
                                     <path d="M5 21v-14l8 -4v18" />
                                     <path d="M19 21v-10l-6 -4" />
                                     <line x1="9" y1="9" x2="9" y2="9.01" />
                                     <line x1="9" y1="12" x2="9" y2="12.01" />
                                     <line x1="9" y1="15" x2="9" y2="15.01" />
                                     <line x1="9" y1="18" x2="9" y2="18.01" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Verifikasi Sekolah</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('verifikasi.campaign') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Verifikasi Campaign</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('verifikasi.campaign') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-800 hover:bg-gray-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1" stroke="currentColor" class="size-4">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m-6 3.75 3 3m0 0 3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                 </svg>

                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Verifikasi Donasi</span>
                             </a>
                         </li>

                         <li>
                             <a href="{{ route('admin.berita.index') }}"
                                 class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100">
                                 <svg class="h-4 w-4 text-zinc-500" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2
                                                            2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                 </svg>
                                 <span class="text-s ms-3 flex-1 whitespace-nowrap text-sm">Berita</span>
                             </a>
                         </li>
                     @endif
                 @endauth

                 {{-- !!! start here !!! --}}


             </ul>
         </div>
     </aside>

     <div class="flex h-screen flex-col md:ml-56">
         <div
             class="scrollbar-thumb-rounded-full scrollbar scrollbar-thin scrollbar-thumb-opacity-0 rounded-tl-[1.25rem mt-16 flex h-32 flex-1 overflow-y-auto overflow-x-hidden overflow-y-scroll bg-gray-100">
             <div class="w-full p-8">
                 @yield('content')
             </div>
         </div>
     </div>


     <script src="{{ asset('./node_modules/flowbite/dist/flowbite.js') }}"></script>
     <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
     <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
     <script src="{{ asset('js/apexcharts/apexcharts.min.js') }}"></script>
     <script src="{{ asset('js/apex.init.js') }}"></script>
     @yield('pagescript')

 </body>

 </html>
