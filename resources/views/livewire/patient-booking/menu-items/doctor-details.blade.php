<div class="w-full max-w-6xl mx-auto p-6 mt-16">
    <!-- Doctor Profile Card -->
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-beige-600 to-beige-800 h-32 relative">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        </div>
        
        <div class="px-6 py-6 flex flex-col md:flex-row">
            <!-- Doctor Image -->
            <div class="relative -mt-20 md:-mt-16 flex-shrink-0 mx-auto md:mx-0">
                <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white">
                    <img 
                        src="{{ asset('storage/' . $doctor->image) }}" 
                        alt="{{ $doctor->user->name }}" 
                        class="w-full h-full object-cover rounded-full"
                        onerror="this.src='{{ asset('images/default-doctor.jpg') }}'" 
                    />
                </div>
                <div class="absolute bottom-0 right-0 w-6 h-6 rounded-full {{ $doctor->status ? 'bg-green-500' : 'bg-red-500' }} border-2 border-white"></div>
            </div>

            <!-- Doctor Basic Info -->
            <div class="mt-6 md:mt-0 md:ml-6 text-center md:text-left flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Dr. {{ $doctor->user->name }}</h2>
                        <p class="text-beige-600 font-medium mt-1">{{ $doctor->qualification ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="mt-4 md:mt-0">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $doctor->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            <span class="w-2 h-2 mr-2 rounded-full {{ $doctor->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $doctor->status ? 'Available for Appointments' : 'Currently Unavailable' }}
                        </span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="flex items-center">
                        <span class="text-beige-600 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </span>
                        <p class="text-gray-700"><span class="font-semibold">Department:</span> {{ $doctor->department?->name ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="flex items-center">
                        <span class="text-beige-600 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <p class="text-gray-700"><span class="font-semibold">Consultation Fee:</span> <span class="text-beige-700 font-medium">₹{{ $doctor->fee }}</span></p>
                    </div>
                    
                    <div class="flex items-center">
                        <span class="text-beige-600 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <p class="text-gray-700"><span class="font-semibold">Available:</span>
                            <span class="text-beige-600">
                                @if ($doctor->available_days)
                                    {{ implode(', ', $doctor->available_days) }}
                                @else
                                    Not specified
                                @endif
                            </span>
                        </p>
                    </div>
                    
                    <div class="flex items-center">
                        <span class="text-beige-600 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <p class="text-gray-700"><span class="font-semibold">Time:</span> 
                            <span class="text-beige-600">
                                {{ $doctor->start_time ?? '9:00 AM' }} - {{ $doctor->end_time ?? '5:00 PM' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Doctor Details and Booking Section -->
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Doctor Details -->
        <div class="lg:col-span-2 space-y-8">
            <!-- About Doctor -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800">About Doctor</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-700">
                        {{ $doctor->description ?? 'Dr. ' . $doctor->user->name . ' is a dedicated healthcare professional with expertise in their field. They are committed to providing exceptional patient care and staying current with the latest medical advancements.' }}
                    </p>
                </div>
            </div>
            
            <!-- Specialties -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800">Specialties</h3>
                </div>
                <div class="p-6">
                    @if($doctor->specialties)
                        <div class="flex flex-wrap gap-2">
                            @foreach($doctor->specialties as $specialty)
                                <span class="bg-beige-50 text-beige-700 rounded-full px-3 py-1 text-sm">
                                    {{ $specialty }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-beige-50 text-beige-700 rounded-full px-3 py-1 text-sm">
                                {{ $doctor->department?->name ?? 'General Medicine' }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Experience & Education -->
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800">Experience & Education</h3>
                </div>
                <div class="p-6">
                    @if($doctor->education)
                        <div class="space-y-4">
                            @foreach($doctor->education as $edu)
                                <div class="flex gap-4">
                                    <div class="w-2 h-2 rounded-full bg-beige-500 mt-2"></div>
                                    <div>
                                        <h4 class="font-medium text-gray-800">{{ $edu['degree'] }}</h4>
                                        <p class="text-gray-600 text-sm">{{ $edu['institution'] }} ({{ $edu['year'] }})</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-700">{{ $doctor->qualification ?? 'Information not available' }}</p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Right Column: Appointment Booking -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden sticky top-24">
                <div class="px-6 py-5 bg-beige-600 text-white">
                    <h3 class="text-xl font-bold">Book an Appointment</h3>
                </div>
                <div class="p-6 flex justify-between items-center">
                    <div class="flex-shrink-0">
                <a href="{{ route('book.appointment') }}" class="self-center inline-flex items-center bg-beige-600 border-0 py-3 px-6 focus:outline-none hover:bg-beige-700 rounded-lg text-white font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Book Appointment
                </a>
                <p class="text-xs text-gray-500 mt-2 text-center">Or call us at: +91 {{ $contact_phone ?? '1234567890' }}</p>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>