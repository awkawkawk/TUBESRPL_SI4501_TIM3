 <!DOCTYPE html>
 <html lang="id">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>@yield('title', 'EduFund')</title>
     <link rel="icon" type="image/png" href="{{ asset('assets/img/miniLogo.png') }}">
     @vite(['public/css/app.css', 'resources/js/app.js'])
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
         rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     @cloudinaryJS
 </head>

 <body>
     <nav class="fixed top-0 z-50 w-full bg-white bg-gradient-to-r from-gray-900 to-gray-700 font-sans">
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
                     <div class="flex md:order-1">
                         <div class="relative hidden w-96 md:block">
                             <input type="text" id="search-navbar"
                                 class="text-smtext-gray-900 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 ps-4 focus:border-gray-500 focus:ring-0"
                                 placeholder="Cari..." name="keyword" value="{{ $query ?? '' }}">
                             <div class="pointer-events-none absolute inset-y-0 end-4 flex items-center ps-3">
                                 <svg class="h-4 w-4 text-gray-500" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                 </svg>
                                 <span class="sr-only">Ikon pencarian</span>
                             </div>
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
                 <div class="ms-auto flex gap-8">
                     <a href="{{ route('index.donation') }}"
                         class="rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-2">
                         Donasi Sekarang
                     </a>

                     <a href="{{ route('register.school.form') }}"
                         class="rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-2">
                         Daftarkan Sekolah
                     </a>
                     <div class="hidden w-full items-center justify-between md:order-2 md:flex md:w-auto"
                         id="navbar-search">
                         <button type="button"
                             class="flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300"
                             aria-expanded="false" data-dropdown-toggle="dropdown-user">
                             <span class="sr-only">Buka menu pengguna</span>
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
                 </div>
             @else
                 <div class="ms-auto flex gap-8">
                     <a href="{{ route('index.donation') }}"
                         class="ms-auto rounded-md px-3 py-2 text-sm text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                         Donasi Sekarang
                     </a>

                     <a href="{{ route('register.school.form') }}"
                         class="ms-auto rounded-md px-3 py-2 text-sm text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                         Daftarkan Sekolah
                     </a>
                     <a href="{{ route('login') }}" class="">
                         <button
                             class="text-primarylight ms-auto rounded-lg rounded-md bg-white px-6 py-2 text-sm font-semibold ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                             Masuk
                         </button>
                     </a>
                 </div>


                 {{-- <a href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-sm text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white md:order-3">
                    Daftar
                </a> --}}
             @endauth
         </div>
         </div>
     </nav>
     <div class="flex h-screen flex-col">
         <div
             class="scrollbar-thumb-rounded-full scrollbar scrollbar-thin scrollbar-thumb-opacity-0 mt-16 flex h-32 flex-1 overflow-y-auto overflow-x-hidden overflow-y-scroll rounded-tl-[1.25rem] bg-gray-100">
             @yield('content')
         </div>
     </div>


     <script src="{{ asset('./node_modules/flowbite/dist/flowbite.js') }}"></script>
 </body>

 </html>
