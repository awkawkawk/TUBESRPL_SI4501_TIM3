@php
    use Illuminate\Support\Facades\Storage;
@endphp
@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-black to-gray-800 p-6 text-center">
            <h2 class="text-4xl font-extrabold text-white">{{ $school->nama_sekolah }}</h2>
        </div>
        <div class="p-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/3 mb-6 md:mb-0 text-center">
                    <img src="{{ $school->logo_sekolah }}" alt="Logo Sekolah" class="w-48 h-48 object-cover rounded-full border-4 border-black mx-auto" referrerpolicy="no-referrer">
                </div>
                <div class="md:w-2/3 md:pl-10">
                    <h3 class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-500 text-transparent bg-clip-text mb-6 shadow-md">Informasi Sekolah</h3>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <th class="py-3 px-6 bg-black font-medium text-left text-white">ID Sekolah</th>
                                    <td class="py-3 px-6">{{ $school->id }}</td>
                                </tr>
                                <tr>
                                    <th class="py-3 px-6 bg-black font-medium text-left text-white">Nama Sekolah</th>
                                    <td class="py-3 px-6">{{ $school->nama_sekolah }}</td>
                                </tr>
                                <tr>
                                    <th class="py-3 px-6 bg-black font-medium text-left text-white">Alamat</th>
                                    <td class="py-3 px-6">{{ $school->alamat_sekolah }}</td>
                                </tr>
                                <tr>
                                    <th class="py-3 px-6 bg-black font-medium text-left text-white">No. Telepon</th>
                                    <td class="py-3 px-6 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-black" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884l1.671-3.956A1 1 0 014.608 1h3.733c.392 0 .735.225.902.57l1.234 2.648a.992.992 0 01-.232 1.106l-1.608 1.608a7.478 7.478 0 003.758 3.758l1.608-1.608a.992.992 0 011.106-.232l2.648 1.234a1 1 0 01.57.902v3.733a1 1 0 01-1.027.936l-3.956-1.671c-3.787-1.6-6.633-4.445-8.233-8.233z"/></svg>
                                        {{ $school->no_telepon_sekolah }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-3 px-6 bg-black font-medium text-left text-white">Email Sekolah</th>
                                    <td class="py-3 px-6 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-black" fill="currentColor" viewBox="0 0 20 20"><path d="M2.94 5.94a1 1 0 00-1.32-.083L1.586 6.41a.25.25 0 00-.084.18V12.5a1.5 1.5 0 001.5 1.5h13a1.5 1.5 0 001.5-1.5V6.59a.25.25 0 00-.083-.179l-1.034-.553a1 1 0 00-1.32.083l-4.715 4.714-4.715-4.714zM2 7.118V12.5a.5.5 0 00.5.5h13a.5.5 0 00.5-.5V7.118l-5.226 5.226a2 2 0 01-2.828 0L2 7.118z"/></svg>
                                        {{ $school->email_sekolah }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 p-4 bg-gray-50 text-gray-800 rounded-lg shadow-md transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <svg class="inline-block w-6 h-6 mr-2 text-gray-800" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 8a6 6 0 01-11.36 3.29l-4.22 4.21a1 1 0 01-1.42-1.41l4.22-4.22A6 6 0 1118 8zm-1 0a5 5 0 10-10 0 5 5 0010 0z" clip-rule="evenodd"/></svg>
                        Informasi di atas adalah data terbaru yang tersedia.
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 p-4 text-center">
            <a href="{{ route('schools.index') }}" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-6 rounded-full transition duration-300">Kembali ke Daftar Sekolah</a>
        </div>
    </div>
</div>
@endsection
