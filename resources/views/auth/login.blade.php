<x-guest-layout>
    @section('title', 'Masuk ke EduFund')
        <div class="">
            <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                <div class="h-full w-full">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <!-- Left column container-->
                            <div class="flex h-screen w-1/2 flex-wrap items-center px-4 md:px-0">
                                <div class="w-screen md:mx-6 md:p-12">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <p class="mb-4 mt-8">Silahkan login ke akun kamu</p>

                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="mt-1 block w-full" type="email"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Kata Sandi')" />

                                            <x-text-input id="password" class="mt-1 block w-full" type="password"
                                                name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mt-4 block">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                    name="remember" />
                                                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya?') }}</span>
                                            </label>
                                        </div>

                                        <!-- Submit button -->
                                        <div id="Masuk" class="pb-1 pt-1 text-center">
                                            <x-primary-button class="bg-primary mb-2 flex w-full text-center hover:bg-primarydark">
                                                {{ __('Masuk') }}
                                            </x-primary-button>

                                            <a class="mt-8 w-full rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                href="{{ route('password.request') }}">
                                                {{ __('Lupa kata sandi?') }}
                                            </a>
                                        </div>

                                        <!-- Register button -->
                                        <div class="flex items-center justify-between pb-6">
                                            <p class="mb-0 me-2"></p>
                                            <a href="{{ route('register') }}"
                                                class="px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0 dark:hover:bg-rose-950 dark:focus:bg-rose-950">
                                                Belum punya akun?
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Right column container with background and description-->
                            <div class="flex flex-wrap h-screen w-1/2 items-center bg-gradient-to-tl from-primary to-[#762919]">


                                <div class="px-24 py-6 text-white md:mx-6 md:p-12">
                                    <!--Logo-->
                                    <div class="">
                                        <a href="/">
                                            <img src="{{ asset('assets/img/EduFundv2-white.png') }}" class="w-32 mb-4"
                                                alt="EduFund" />
                                        </a>
                                    </div>
                                    <h4 class="mb-6 text-4xl font-bold">
                                        Donasikan Untuk Masa Depan Sekolah!
                                    </h4>
                                    <p class="text-normal font-light">
                                        EduFund adalah platform donasi untuk membantu sekolah-sekolah yang membutuhkan di Indonesia. Kami percaya setiap anak berhak mendapatkan pendidikan berkualitas. Dengan dukungan Anda, kita dapat menyediakan fasilitas, bahan ajar, dan peluang pendidikan yang lebih baik. Sumbangan Anda adalah investasi dalam masa depan anak-anak Indonesia. Mari tumbuhkan harapan dan ciptakan perubahan nyata dengan EduFund. Donasikan untuk masa depan sekolah hari ini!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
