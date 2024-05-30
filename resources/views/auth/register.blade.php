<x-guest-layout>
    @section('title', 'Daftar ke EduFund')
    <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
        <div class="">
            <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                <div class="h-screen w-screen">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <!-- Left column container-->
                            <div class="flex h-screen w-1/2 flex-wrap items-center px-4 md:px-0">
                                <div class="w-screen md:mx-6 md:p-12">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('register.post') }}">
                                        @csrf

                                        <p class="mb-4 mt-8">Please register your account</p>

                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" :value="__('Nama')" />
                                            <x-text-input id="name" class="mt-1 block w-full" type="text"
                                                name="name" :value="old('name')" required autofocus
                                                autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Nomor Handphone -->
                                        <div class="mt-4">
                                            <x-input-label for="phone" :value="__('Nomor Handphone')" />
                                            <x-text-input id="phone" class="mt-1 block w-full" type="text"
                                                name="phone" :value="old('phone')" required autofocus
                                                autocomplete="phone" />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="mt-1 block w-full" type="email"
                                                name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Kata Sandi')" />

                                            <x-text-input id="password" class="mt-1 block w-full" type="password"
                                                name="password" required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
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
                                            href="{{ route('register.school') }}">
                                            {{ __('Ingin Daftarkan Sekolah Anda?') }}
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
