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
        <p class="h1 mb-2 ml-14 mr-14 block text-justify text-xl font-semibold text-black">{{ $news->title }}</p>
        <p class="mx-auto mb-8 ml-14 text-justify text-sm font-light text-black">{{ $news->release_date }}</p>

        @if ($news->image)
            <div class="mt-4 ml-14 mr-14">
                <img src="{{ asset('storage/news_photo/' . $news->image) }}" alt="News Image" class="w-full h-auto">
            </div>
        @endif

        <div class="mt-8 ml-14 mr-14 text-justify text-black">
        {!! $news->content !!}
        </div>
    </div>
</div>

@endsection
