<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 bg-white">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800">Our Facility Gallery</h2>
        <p class="mt-3 text-lg text-gray-500">Take a glimpse into our world-class infrastructure and care environment.</p>
        <div class="mt-2 flex justify-center">
            <div class="h-1 w-24 bg-blue-600 rounded-full"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($images as $image)
            <div class="relative overflow-hidden rounded-2xl shadow hover:shadow-lg transition-shadow duration-300 group">
                <img
                    src="{{ asset('storage/gallery/' . $image->filename) }}"
                    alt="{{ $image->alt ?? 'Gallery image' }}"
                    loading="lazy"
                    class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300"
                />
                @if ($image->category)
                    <div class="absolute top-2 left-2 bg-white text-blue-700 text-xs px-2 py-1 rounded shadow">
                        {{ $image->category }}
                    </div>
                @endif
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                No images available in the gallery.
            </div>
        @endforelse
    </div>

   
</div>
