<div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-20 to-white">
    {{-- Heading with enhanced styling --}}
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Meet Our Expert</h1>
        <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">Browse and schedule consultations with our highly qualified medical professionals</p>
        <div class="mt-2 flex justify-center">
            <div class="h-1 w-24 bg-beige-600 rounded-full"></div>
        </div>
    </div>

    {{-- Enhanced Search with icon --}}
    <div class="flex justify-center mb-8">
        <div class="relative w-full md:w-2/3 lg:w-1/2">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search by name, specialty, or expertise..."
                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none">
        </div>
    </div>

    {{-- Doctor Grid with fixed height cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @forelse ($doctors as $doctor)
        <a wire:navigate  href="{{ route('doctors.detail', ['slug' => $doctor->slug]) }}" class="block h-full">
        <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col">
            <div class="p-6 flex-grow">
                <div class="flex items-start gap-5">
                    <div class="flex-shrink-0">
                        <img
                            class="w-20 h-20 rounded-full object-cover border-2 border-beige-100 shadow"
                            src="{{ $doctor->image ? $doctor->image: asset('images/default.jpg') }}"
                            alt="Dr. {{ $doctor->user->name }}"> 
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xl font-bold text-gray-800 truncate">Dr. {{ $doctor->user->name }}</h3>
                        <p class="text-sm font-medium text-beige-600 truncate">{{ $doctor->department->name }}</p>
                        <p class="text-sm font-medium text-gray-600 line-clamp-1">{{ $doctor->qualification }}</p>
                        <p class="font-medium text-xs line-clamp-1">{{ is_array($doctor->available_days) ? implode(', ', $doctor->available_days) : '-' }}</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <div class="flex items-center text-amber-500">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4" fill="#906A39" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 mt-auto">
                <div class="flex justify-between text-sm text-gray-500">
                    @if ($doctor->isAvailableToday)
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Available Today
                        </span>
                    @else
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Not Available Today
                        </span>
                    @endif
                </div>
            </div>
        </div>
        </a>
        @empty
        <div class="col-span-full py-16 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-2 text-xl font-medium text-gray-900">No doctors found</h3>
            <p class="mt-1 text-gray-500">Try adjusting your search criteria.</p>
        </div>
        @endforelse
    </div>
</div>
</div>