<div class="w-full max-w-4xl mx-auto p-8  rounded-3xl shadow-lg mt-10 ">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <!-- Doctor Image with improved styling -->
        <div class="relative">
            <div class="absolute inset-0 bg-blue-500 rounded-full opacity-10 blur-md transform scale-110"></div>
            <img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image"
                class="relative w-48 h-48 object-cover rounded-full border-4 border-blue-500 shadow-md" />
            <div class="absolute bottom-0 right-0 w-6 h-6 rounded-full {{ $doctor->status ? 'bg-green-500' : 'bg-red-500' }} border-2 border-white"></div>
        </div>

        <!-- Doctor Information with improved typography and layout -->
        <div class="flex-1 w-full space-y-4">
            <h2 class="text-3xl font-bold text-gray-800">{{ $doctor->user->name }}</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
                <div class="flex items-center">
                    <span class="text-blue-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                    <p class="text-gray-700"><span class="font-semibold">Qualification:</span> {{ $doctor->qualification ?? 'N/A' }}</p>
                </div>
                
                <div class="flex items-center">
                    <span class="text-blue-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </span>
                    <p class="text-gray-700"><span class="font-semibold">Department:</span> {{ $doctor->department?->name ?? 'N/A' }}</p>
                </div>
                
                <div class="flex items-center">
                    <span class="text-blue-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700"><span class="font-semibold">Consultation Fee:</span> <span class="text-blue-700 font-medium">₹{{ $doctor->fee }}</span></p>
                </div>
                
                <div class="flex items-center">
                    <span class="text-blue-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <p class="text-gray-700"><span class="font-semibold">Available Days:</span>
                        <span class="text-blue-600">
                            @if ($doctor->available_days)
                                {{ implode(', ', $doctor->available_days) }}
                            @else
                                Not specified
                            @endif
                        </span>
                    </p>
                </div>
            </div>
            
            <div class="mt-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $doctor->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    <span class="w-2 h-2 mr-2 rounded-full {{ $doctor->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                    {{ $doctor->status ? 'Available for Appointments' : 'Currently Unavailable' }}
                </span>
            </div>
        </div>
    </div>

    
</div>