<div class="max-w-7xl mx-auto px-4 py-12 space-y-12">
    {{-- Header Section --}}
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">Join Our Team</h1>
        <p class="mt-4 text-lg text-gray-600">
            We’re always looking for passionate professionals to help us provide world-class care.
        </p>
    </div>

    {{-- Livewire Job Listings --}}
    <div class="space-y-6">
    {{-- Search Bar --}}
    <div class="flex justify-center">
        <input type="text"
               wire:model.live="search"
               placeholder="Search for a job title..."
               class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-beige-200">
    </div>

    {{-- Job Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @if($jobs->isEmpty())
            <div class="col-span-full text-center py-12">
                <div class="max-w-md mx-auto">
                    <svg class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">No active Jobs found</h3>
                    <p class="text-gray-500">We're growing fast! Check back soon for new opportunities.</p>
                </div>
            </div>
        @else
            <div class="col-span-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="group bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 hover:border-beige-100">
                        <!-- Header with accent bar -->
                        <div class="h-2 bg-gradient-to-r from-beige-500 to-beige-300"></div>
                        
                        <div class="p-6 flex flex-col h-full">
                            <!-- Title with hover effect -->
                            <h2 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-beige-600 transition-colors duration-200">
                                {{ $job->title }}
                            </h2>
                            
                            <!-- Description -->
                            <p class="text-gray-600 mb-5 flex-grow leading-relaxed">
                                {{ Str::limit($job->description, 40, '...') }}
                            </p>
                            
                            <!-- Details with icons -->
                            <div class="space-y-3 mb-6">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-gray-400 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $job->location }}</span>
                                </div>
                                
                                @if($job->salary)
                                    <div class="flex items-start">
                                        <svg class="h-5 w-5 text-gray-400 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-700">{{ $job->salary }}</span>
                                    </div>
                                @endif
                                
                                
                            </div>
                            
                            <!-- Text link with arrow icon -->
                            <div class="mt-auto">
                                <a wire:navigate href="{{ route('career.detail', $job->id) }}" 
                                   class="inline-flex items-center text-beige-600 hover:text-beige-800 font-medium transition-colors duration-200 group/link">
                                    View Details
                                    <svg class="ml-2 h-4 w-4 transition-transform duration-200 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

    {{-- Submit Resume CTA --}}
    <div class="bg-beige-100 p-8 rounded-xl text-center">
        <h2 class="text-2xl font-semibold text-beige-900">Can't find a role that fits?</h2>
        <p class="mt-2 text-beige-800">We're always accepting resumes from great people.</p>
        <button wire:click="openModal"
           class="inline-block mt-4 px-6 py-3 bg-beige-600 text-white rounded-full hover:bg-beige-700 transition">
            Submit Your Resume
        </button>
    </div>
    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" wire:click.self="closeModal">
        <div class="bg-white rounded-xl shadow-xl p-6 max-w-md w-full mx-4 relative" @click.stop>
            <!-- Close Button -->
            <button wire:click="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Modal Content -->
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-beige-100 mb-4">
                    <svg class="h-6 w-6 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 mb-6">Send Your Resume/CV to us using one of these methods:</p>
            </div>
            
            <div class="space-y-4">
                <!-- Phone -->
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex-shrink-0 bg-beige-100 p-2 rounded-lg">
                        <svg class="h-5 w-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="text-gray-800 font-medium">+91 9471659700</p>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex-shrink-0 bg-beige-100 p-2 rounded-lg">
                        <svg class="h-5 w-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-gray-800 font-medium">info@healingtouchpurnea.com</p>
                    </div>
                </div>
                
                <!-- Address -->
                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                    <div class="flex-shrink-0 bg-beige-100 p-2 rounded-lg">
                        <svg class="h-5 w-5 text-beige-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Address</p>
                        <p class="text-gray-800 font-medium">Hope Chauraha, Purnea 854301</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>

