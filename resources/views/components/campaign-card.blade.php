<div class="w-64 max-w-sm rounded-lg border border-gray-200 bg-white shadow">
    <a href="{{ $link ?? '#' }}">
        <img class="h-64 rounded-t-lg object-cover" src="{{ asset($imagePath) }}" alt="{{ $altText ?? '' }}" />
        <div class="p-5">
            <a href="{{ $link ?? '#' }}">
                <h5 class="text-xl font-bold tracking-tight text-black">{{ $title }}</h5>
            </a>
            <p class="mb-2 text-xs font-normal text-black">{{ $location }}</p>
            <p class="mb-4 text-sm font-normal text-black">{{ $description }}</p>
            {{ $slot }}
        </div>
    </a>
</div>
