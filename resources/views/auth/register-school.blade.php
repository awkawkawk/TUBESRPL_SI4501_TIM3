<x-guest-layout>
    @section('title', 'Daftarkan Sekolahmu ke EduFund')
    <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
        <div class="">
            <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                <div class="h-screen w-screen">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <!-- Left column container-->
                            <div class="flex h-screen w-1/2 flex-wrap items-center px-4 md:px-0 overflow-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                                <div class="w-screen md:mx-6 md:p-12">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('register.school') }}"" enctype="multipart/form-data">
                                        @csrf

                                        <p class="mb-4 mt-6">Please register your account</p>
                                        {{$errors}}

                                        {{-- Pendaftar --}}
                                        <div>
                                            <x-input-label for="nama_pendaftar" :value="__('Nama Pendaftar')" />
                                            <x-text-input id="nama_pendaftar" class="mt-1 block w-full" type="text"
                                                name="nama_pendaftar" :value="old('nama_pendaftar')" required autofocus
                                                autocomplete="nama_pendaftar" />
                                            <x-input-error :messages="$errors->get('nama_pendaftar')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="no_hp_pendaftar" :value="__('Nomor Handphone Pendaftar')" />
                                            <x-text-input id="no_hp_pendaftar" class="mt-1 block w-full" type="tel"
                                                name="no_hp_pendaftar" :value="old('no_hp_pendaftar')" required autocomplete="tel" />
                                            <x-input-error :messages="$errors->get('no_hp_pendaftar')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="email_pendaftar" :value="__('Email Pendaftar')" />
                                            <x-text-input id="email_pendaftar" class="mt-1 block w-full" type="Email"
                                                name="email_pendaftar" :value="old('email_pendaftar')" required
                                                autocomplete="email_pendaftar" />
                                            <x-input-error :messages="$errors->get('email_pendaftar')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="identitas_pendaftar" :value="__('Identitas Pendaftar')" />
                                            <x-text-input id="identitas_pendaftar" class="mt-1 block w-full"
                                                type="text" name="identitas_pendaftar" :value="old('identitas_pendaftar')" required
                                                autocomplete="identitas_pendaftar" />
                                            <x-input-error :messages="$errors->get('identitas_pendaftar')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="bukti_id_pendaftar" :value="__('Bukti ID Pendaftar')" />
                                            <x-file-input id="bukti_id_pendaftar" class="mt-1 block w-full"
                                                name="bukti_id_pendaftar" required autofocus
                                                autocomplete="bukti_id_pendaftar" />
                                            <x-input-error :messages="$errors->get('bukti_id_pendaftar')" class="mt-2" />
                                        </div>
                                        <!-- Logo Sekolah -->
                                        <div class="mt-4">
                                            <x-input-label for="logo_sekolah" :value="__('Logo Sekolah')" />
                                            <x-file-input id="logo_sekolah" class="mt-1 block w-full"
                                                name="logo_sekolah" required autofocus autocomplete="logo_sekolah" />
                                            <x-input-error :messages="$errors->get('logo_sekolah')" class="mt-2" />
                                        </div>

                                        <!-- Nama Sekolah -->
                                        <div class="mt-4">
                                            <x-input-label for="nama_sekolah" :value="__('Nama Sekolah')" />
                                            <x-text-input id="nama_sekolah" class="mt-1 block w-full" type="text"
                                                name="nama_sekolah" :value="old('nama_sekolah')" required autofocus
                                                autocomplete="nama_sekolah" />
                                            <x-input-error :messages="$errors->get('nama_sekolah')" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="alamat_sekolah" :value="__('Alamat Sekolah')" />
                                            <x-text-input id="alamat_sekolah" class="mt-1 block w-full" type="text"
                                                name="alamat_sekolah" :value="old('alamat_sekolah')" required
                                                autocomplete="alamat_sekolah" />
                                            <x-input-error :messages="$errors->get('alamat_sekolah')" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="no_telepon_sekolah" :value="__('Nomor Handphone Sekolah')" />
                                            <x-text-input id="no_telepon_sekolah" class="mt-1 block w-full"
                                                type="tel" name="no_telepon_sekolah" :value="old('no_telepon_sekolah')" required
                                                autocomplete="tel" />
                                            <x-input-error :messages="$errors->get('no_telepon_sekolah')" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="email_sekolah" :value="__('Email Sekolah')" />
                                            <x-text-input id="email_sekolah" class="mt-1 block w-full" type="email"
                                                name="email_sekolah" :value="old('email_sekolah')" required
                                                autocomplete="email_sekolah" />
                                            <x-input-error :messages="$errors->get('email_sekolah')" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Kata Sandi')" />
                                            <x-text-input id="password" class="mt-1 block w-full" type="password"
                                                name="password" required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                                            <x-text-input id="password_confirmation" class="mt-1 block w-full"
                                                type="password" name="password_confirmation" required
                                                autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>


                                        <x-primary-button class="bg-primary my-6 flex w-full text-center hover:bg-primarydark">
                                            {{ __('Daftar') }}
                                        </x-primary-button>
                                        <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                            href="{{ route('login') }}">
                                            {{ __('Sudah terdaftar?') }}
                                        </a>
                                    </form>
                                </div>
                            </div>

                            <!-- Right column container with background and description-->
                            <div
                                class="from-primary flex h-screen w-1/2 flex-wrap items-center bg-gradient-to-tl to-[#762919]">


                                <div class="px-24 py-6 text-white md:mx-6 md:p-12">
                                    <!--Logo-->
                                    <div class="">
                                        <a href="/">
                                            <img src="{{ asset('assets/img/EduFundv2-white.png') }}" class="mb-4 w-32"
                                                alt="EduFund" />
                                        </a>
                                    </div>
                                    <h4 class="mb-6 text-4xl font-bold">
                                        Donasikan Untuk Masa Depan Sekolah!
                                    </h4>
                                    <p class="text-normal font-light">
                                        EduFund adalah platform donasi untuk membantu sekolah-sekolah yang
                                        membutuhkan di Indonesia. Kami percaya setiap anak berhak mendapatkan
                                        pendidikan berkualitas. Dengan dukungan Anda, kita dapat menyediakan
                                        fasilitas, bahan ajar, dan peluang pendidikan yang lebih baik. Sumbangan
                                        Anda adalah investasi dalam masa depan anak-anak Indonesia. Mari tumbuhkan
                                        harapan dan ciptakan perubahan nyata dengan EduFund. Donasikan untuk masa
                                        depan sekolah hari ini!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
