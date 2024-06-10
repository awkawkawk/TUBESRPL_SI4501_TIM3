@extends('layouts.master')

@section('content')

<div class="grid h-fit w-full grid-flow-row">
    <div class="md:col-span-1">
        <div class="mt-4 text-left">
            <div class="flex items-center mb-4">
                <svg class="w-4 h-4 mr-2 text-gray-800 dark:text-white" aria-hidden="true" fill="none"
                    viewBox="0 0 14 10" style="margin-right: 8px;">
                    <path stroke="rgb(75, 85, 101)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                <a href="{{ route('admin.berita.index')}}" class="text-sm font-light text-gray-700 text-justify"
                    style="margin-left: 8px;"><b>Kembali
                    </b></a>
            </div>
        </div>
    </div>
    <div class="col-span-3 mt-16 lg:mt-4">
        <p class="h1 mb-2 ml-14 block text-justify text-xl font-semibold text-black">Tambah Berita</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data"
            class="ml-14 mr-14">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea name="content" id="content" rows="5" class="mt-1 block w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="release_date" id="tanggal" class="mt-1 block w-1/3" required>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="image" id="foto" class="mt-1 block w-full" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700">Link Berita</label>
                <input type="text" name="link" id="link" class="mt-1 block w-full" required>
            </div>
            <div class="flex justify-end mb-6">
                <button type="submit" id="simpan-button" class="bg-primary text-white font-bold py-2 px-8 rounded-lg">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>

@endsection
