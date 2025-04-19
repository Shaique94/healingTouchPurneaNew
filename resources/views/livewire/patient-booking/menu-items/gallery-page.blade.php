<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Our <span class="text-beige-600">Facility Gallery</span></h2>
            <div class="w-24 h-1 bg-gray-600 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Take a glimpse into our world-class infrastructure and care environment
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($images as $image)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 group">
                    <div class="h-64 overflow-hidden">
                        <img
                            src="{{ asset('storage/gallery/' . $image->filename) }}"
                            alt="{{ $image->alt ?? 'Gallery image' }}"
                            loading="lazy"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300"
                        />
                    </div>
                    @if ($image->category)
                        <div class="absolute  bg-beige-100 text-beige-600 text-xs px-2 py-1 rounded shadow">
                            {{ $image->category }}
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-full text-center p-8 bg-white rounded-lg shadow-md">
                    <p class="text-gray-600">No images available in the gallery.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="#" class="inline-block bg-beige-400 hover:bg-beige-700 text-white font-medium py-3 px-6 rounded-md transition-colors">
                View Full Gallery
            </a>
        </div>
    </div>
</div>