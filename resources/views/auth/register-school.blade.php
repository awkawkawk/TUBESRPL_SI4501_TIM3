<x-guest-layout>
    <form method="POST" action="{{ route('register.school') }}">
        @csrf

        <!-- Nama Sekolah -->
        <div>
            <x-input-label for="school_name" :value="__('Nama Sekolah')" />
            <x-text-input id="school_name" class="mt-1 block w-full" type="text" name="school_name" :value="old('school_name')" required
                autofocus autocomplete="school_name" />
            <x-input-error :messages="$errors->get('school_name')" class="mt-2" />
        </div>

        <!-- Alamat Sekolah -->
        <div class="mt-4">
            <x-input-label for="school_address" :value="__('Alamat Sekolah')" />
            <x-text-input id="school_address" class="mt-1 block w-full" type="text" name="school_address" :value="old('school_address')"
                required autocomplete="school_address" />
            <x-input-error :messages="$errors->get('school_address')" class="mt-2" />
        </div>

        <!-- Nomor Handphone Sekolah -->
        <div class="mt-4">
            <x-input-label for="school_phone" :value="__('Nomor Handphone Sekolah')" />
            <x-text-input id="school_phone" class="mt-1 block w-full" type="tel" name="school_phone" :value="old('school_phone')"
                required autocomplete="tel" />
            <x-input-error :messages="$errors->get('school_phone')" class="mt-2" />
        </div>

        <!-- Email Sekolah -->
        <div class="mt-4">
            <x-input-label for="school_email" :value="__('Email Sekolah')" />
            <x-text-input id="school_email" class="mt-1 block w-full" type="Email" name="school_email" :value="old('school_email')"
                required autocomplete="school_email" />
            <x-input-error :messages="$errors->get('school_email')" class="mt-2" />
        </div>

        <!-- Kata Sandi -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Kata Sandi -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
