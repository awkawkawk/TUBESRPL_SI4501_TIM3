<div class="object-fit hidden duration-700 ease-in-out" data-carousel-item>
    <img src="{{ asset($imagePath) }}"
        class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
        alt="{{ $altText ?? 'Image' }}">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-800 opacity-70 to-transparent"></div>

    <!-- Text Overlay -->
    <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">
        <h2 class="text-2xl font-bold">{{ $title }}</h2>
        <p class="mt-2">{{ $description }}</p>
    </div>
</div>
