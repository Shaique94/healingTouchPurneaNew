<div>
    <!-- Full Page Loader -->
    <div id="fullpage-loader" class="fixed inset-0 bg-white bg-opacity-80 z-50 flex items-center justify-center transition-opacity duration-300 opacity-0 pointer-events-none">
        <div class="text-center">
            <div class="inline-block relative w-20 h-20">
                <div class="absolute top-0 left-0 right-0 bottom-0 border-4 border-sky-200 rounded-full"></div>
                <div class="absolute top-0 left-0 right-0 bottom-0 border-4 border-sky-600 rounded-full animate-spin"
                    style="border-bottom-color: transparent; border-left-color: transparent;"></div>
            </div>
            <p class="mt-4 text-sky-600 text-lg font-medium loading-text">Loading...</p>
        </div>
    </div>

    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 mt-16">
        <div class="max-w-6xl mx-auto">
            <!-- More Compact Page Header -->
            <div class="mb-4 md:mb-6 bg-gradient-to-r from-sky-600 to-sky-800 rounded-xl py-3 md:py-4 px-4 md:px-6 text-white shadow-md">
                <div class="flex flex-wrap items-center justify-between">
                    <!-- Title and Appointment Link in Same Row on Mobile -->
                    <div class="w-full md:w-auto">
                        <h1 class="text-lg md:text-xl font-bold">Book Your Appointment</h1>
                        <p class="text-sky-100 text-xs opacity-90 mt-0.5">Schedule your visit with our specialists</p>
                    </div>

                    <a href="{{ route('manage.appointments') }}" class="inline-flex items-center text-white hover:text-sky-200 text-xs mt-1 md:mt-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Already have an Appointment? Check existing appointment
                    </a>
                </div>

            <!-- Compact Progress Steps -->
            <div class="mt-3 relative">
                <!-- Progress Bar Background -->
                <div class="absolute top-3 left-0 right-0 h-0.5 bg-sky-300 rounded-full z-0 mx-6 md:mx-12"></div>
                
                <!-- Active Progress Bar -->
                <div class="absolute top-3 left-0 h-0.5 bg-white rounded-full z-10 transition-all duration-500 mx-6 md:mx-12"
                     style="width: {{ $step == 4 ? '90%' : min(90, ($step-1) * 30) }}%"></div>
                
                <!-- More Compact Step Indicators -->
                <div class="flex items-center justify-between relative z-20">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div class="{{ $step >= 1 ? 'bg-white text-sky-700 border-2 border-white' : 'bg-sky-700 text-white border border-sky-300' }} 
                            w-6 h-6 md:w-7 md:h-7 rounded-full flex items-center justify-center font-bold text-[10px] md:text-xs transition-all duration-300 shadow-sm">
                                @if($step > 1)
                                <svg class="w-3 h-3 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                1
                                @endif
                            </div>
                            <span class="mt-1 text-[8px] md:text-[10px] font-medium text-white truncate">Doctor</span>
                        </div>

                        <!-- Steps 2 & 3 (repeating same pattern with different numbers) -->
                        <div class="flex flex-col items-center">
                            <div class="{{ $step >= 2 ? 'bg-white text-sky-700 border-2 border-white' : 'bg-sky-700 text-white border border-sky-300' }} 
                            w-6 h-6 md:w-7 md:h-7 rounded-full flex items-center justify-center font-bold text-[10px] md:text-xs transition-all duration-300 shadow-sm">
                                @if($step > 2)
                                <svg class="w-3 h-3 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                2
                                @endif
                            </div>
                            <span class="mt-1 text-[8px] md:text-[10px] font-medium text-white truncate">Details</span>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="{{ $step >= 3 ? 'bg-white text-sky-700 border-2 border-white' : 'bg-sky-700 text-white border border-sky-300' }} 
                            w-6 h-6 md:w-7 md:h-7 rounded-full flex items-center justify-center font-bold text-[10px] md:text-xs transition-all duration-300 shadow-sm">
                                @if($step > 3)
                                <svg class="w-3 h-3 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                3
                                @endif
                            </div>
                            <span class="mt-1 text-[8px] md:text-[10px] font-medium text-white truncate">Review</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 1: Select Doctor -->
            @if($step === 4)
            <div class="space-y-6">
                <!-- Department Filter Cards -->
                <div class="bg-white p-5 rounded-xl shadow-sm">
                    <h2 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Select Department
                    </h2>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" wire:click="$set('selectedDepartment', null)"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200 
                        {{ $selectedDepartment === null ? 'bg-sky-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800' }}">
                            All Departments
                        </button>

                        @foreach($departments as $department)
                        <button type="button" wire:click="$set('selectedDepartment', {{ $department->id }})"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200
                            {{ $selectedDepartment === $department->id ? 'bg-sky-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800' }}">
                            {{ $department->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            
            <!-- Doctors Grid - Improved Compact Layout -->
            <div class="bg-white p-5 rounded-xl shadow-sm">
                <h2 class="text-lg font-medium text-gray-800 mb-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $selectedDoctor ? 'Selected Doctor' : 'Choose a Doctor' }}
                    </div>
                    @if($selectedDoctor)
                        <button 
                            wire:click="$set('selectedDoctor', null)" 
                            class="text-sm text-sky-600 hover:text-sky-800 flex items-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Change Doctor
                        </button>
                    @endif
                </h2>
                
                <!-- Display Selected Doctor Card -->
                @if($selectedDoctor && $doctorDetails)
                    <div class="border rounded-lg overflow-hidden bg-sky-50">
                        <div class="flex flex-col md:flex-row items-start">
                            <div class="md:w-1/3 p-5 flex items-center justify-center md:border-r border-sky-100">
                                <div class="text-center">
                                    <div class="w-28 h-28 rounded-full overflow-hidden bg-white border-4 border-white shadow-lg mx-auto">
                                        <img    src="{{ $doctorDetails->image ? asset('storage/' . $doctorDetails->image): asset('images/default.jpg') }}" class="w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mt-4">Dr. {{ $doctorDetails->user->name }}</h3>
                                    <p class="text-sm font-medium text-sky-600">{{ $doctorDetails->department->name }}</p>
                                </div>
                            </div>
                            
                            <div class="md:w-2/3 p-5">
                                <h4 class="text-sm font-medium text-gray-500 mb-3">Doctor Information</h4>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-start">
                                        <div class="bg-sky-100 p-2 rounded-full mr-3 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Qualification</p>
                                            <p class="text-sm font-medium text-gray-800">MBBS, MD</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-sky-100 p-2 rounded-full mr-3 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Consultation Fee</p>
                                            <p class="text-sm font-medium text-gray-800">₹500</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-sky-100 p-2 rounded-full mr-3 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Department</p>
                                            <p class="text-sm font-medium text-gray-800">{{ $doctorDetails->department->name }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="bg-sky-100 p-2 rounded-full mr-3 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Available Days</p>
                                            <p class="text-sm font-medium text-gray-800">Mon - Sat</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <p class="text-sm text-gray-600">Dr. {{ $doctorDetails->user->name }} is a highly skilled healthcare professional with comprehensive training and experience in the field of {{ $doctorDetails->department->name }}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Show Doctor Grid if no doctor selected -->
                @else
                    @if(count($doctors) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($doctors as $doctor)
                                <div wire:click="selectDoctor({{ $doctor->id }})" 
                                    class="relative flex flex-col h-full border rounded-lg overflow-hidden cursor-pointer transition-all duration-300
                                    {{ $selectedDoctor == $doctor->id ? 'ring-2 ring-sky-500 bg-sky-50' : 'hover:shadow-md' }}">

                            <div class="flex items-center p-3 border-b">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                                    <img src="{{ $doctor->image ? asset('storage/' . $doctor->image): asset('images/default.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-semibold text-gray-900 line-clamp-1">Dr. {{ $doctor->user->name }}</h3>
                                    <p class="text-xs text-sky-600">{{ $doctor->department->name }}</p>
                                </div>
                            </div>

                            <div class="p-3 text-xs text-gray-600 space-y-2 flex-grow">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    {{ $doctor->qualification }}
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    ₹{{ $doctor->fee }} Fee
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ is_array($doctor->available_days) ? implode(', ', $doctor->available_days) : '-' }}
                                </div>
                            </div>

                            <div class="px-3 pb-3">
                                <button class="w-full py-1.5 text-xs font-medium rounded-md transition-colors
                                            bg-gray-100 text-gray-800 hover:bg-gray-200">
                                    Select Doctor
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center py-12 text-gray-500 bg-gray-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p>No doctors available for the selected department.</p>
                        <button wire:click="$set('selectedDepartment', null)" class="mt-4 text-sky-600 font-medium hover:text-sky-700">
                            View all departments
                        </button>
                    </div>
                    @endif
                    @endif
                </div>

                @if($selectedDoctor)
                <!-- Date and Time Selection -->
                <div class="bg-white p-5 rounded-xl shadow-sm">
                    <h2 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Select Date & Time
                    </h2>

                    <!-- Date Tab Selection (Today/Tomorrow) -->
                    <div class="mb-6">
                        <div class="flex border-b border-gray-200">
                            <button
                                wire:click="selectDateTab('today')"
                                wire:loading.class="opacity-50"
                                wire:target="selectDateTab"
                                type="button"
                                class="py-3 px-6 border-b-2 font-medium text-sm focus:outline-none {{ $appointmentDate == date('Y-m-d') ? 'border-sky-600 text-sky-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                                Today
                                <span class="text-xs block text-gray-500">{{ date('d M') }}</span>
                            </button>
                            <button
                                wire:click="selectDateTab('tomorrow')"
                                wire:loading.class="opacity-50"
                                wire:target="selectDateTab"
                                type="button"
                                class="py-3 px-6 border-b-2 font-medium text-sm focus:outline-none {{ $appointmentDate == date('Y-m-d', strtotime('+1 day')) ? 'border-sky-600 text-sky-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                                Tomorrow
                                <span class="text-xs block text-gray-500">{{ date('d M', strtotime('+1 day')) }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Time Slots -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Available Time Slots
                            <span class="text-xs text-gray-500 ml-2">
                                {{ count($availableTimes) }} slots available
                            </span>
                        </label>
                        <div wire:loading wire:target="selectDateTab" class="py-4 text-center text-gray-500">
                            <svg class="animate-spin h-6 w-6 text-sky-600 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="ml-2">Loading time slots...</span>
                        </div>
                        <div wire:loading.remove wire:target="selectDateTab" class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2">
                            @forelse($availableTimes as $time)
                            <button
                                type="button"
                                wire:click="$set('appointmentTime', '{{ $time }}')"
                                class="py-2 px-2 text-sm font-medium rounded-md border transition-colors
                                    {{ $appointmentTime === $time ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}">
                                {{ $time }}
                            </button>
                            @empty
                            <div class="col-span-full py-6 text-center text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>No available time slots for this date.</p>
                                @if($appointmentDate == date('Y-m-d'))
                                <button
                                    wire:click="selectDateTab('tomorrow')"
                                    class="mt-2 text-sm text-sky-600 hover:underline">
                                    Check tomorrow's availability
                                </button>
                                @else
                                <button
                                    wire:click="selectDateTab('today')"
                                    class="mt-2 text-sm text-sky-600 hover:underline">
                                    Check today's availability
                                </button>
                                @endif
                            </div>
                            @endforelse
                        </div>
                        @error('appointmentTime')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <!-- Navigation -->
                <div class="flex justify-end">
                    <button
                        wire:click="nextStep"
                        wire:loading.attr="disabled"
                        @if(!$selectedDoctor) disabled @endif
                        class="px-6 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 disabled:opacity-50 disabled:cursor-not-allowed flex items-center"
                        onclick="showLoader('Processing...')">
                        <span>Continue</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span wire:loading wire:target="nextStep" class="ml-2">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            @endif

            <!-- STEP 2: Patient Details -->
            @if($step === 2)
            <div class="bg-white rounded-xl shadow-sm">
                <!-- Selected Doctor Details (on top) -->
                @if($doctorDetails)
                <div class="flex items-center p-5 border-b border-gray-200 bg-sky-50 rounded-t-xl">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
                        <img src="{{ $doctorDetails->image ? asset('storage/' . $doctorDetails->image): asset('images/default.jpg') }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-lg font-medium text-gray-900">Dr. {{ $doctorDetails->user->name }}</h3>
                        <p class="text-sm text-sky-600">{{ $doctorDetails->department->name }}</p>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($appointmentDate)->format('D, d M Y') }}
                            </span>
                            <span class="mx-2 text-gray-300">|</span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $appointmentTime }}
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Consultation Fee</p>
                        <p class="text-lg font-medium text-gray-900">₹{{ $doctorDetails->fee }}</p>
                    </div>
                </div>
                @endif

                <div class="p-5">
                    <h2 class="text-lg font-medium text-gray-800 mb-5 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Your Information
                    </h2>

                    <div class="grid grid-cols-1 gap-y-5 gap-x-4 sm:grid-cols-6">
                        <!-- Name -->
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <div class="mt-1">
                                <input wire:model.live="name" type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-gray-500 text-xs">(optional)</span></label>
                            <div class="mt-1">
                                <input wire:model.live="email" type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="mt-1">
                                <input wire:model.live="phone" type="tel" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm" maxlength="10">
                            </div>
                            @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="sm:col-span-3">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <div class="mt-1">
                                <select wire:model.live="gender" id="gender" name="gender" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            @error('gender') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="sm:col-span-3">
                            <label for="dob" class="block text-sm font-medium text-gray-700">Age</label>
                            <div class="mt-1">
                                <input wire:model.live="dob" type="text" min="0" max="150" maxlength="3" name="dob" id="dob" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('dob') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Address -->
                        <div class="sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <div class="mt-1">
                                <input wire:model.live="address" type="text" name="address" id="address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('address') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Pincode -->
                        <div class="sm:col-span-2">
                            <label for="pincode" class="block text-sm font-medium text-gray-700">PIN Code</label>
                            <div class="mt-1 relative">
                                <input
                                    wire:model.debounce.500ms="pincode"
                                    wire:change.blur="fetchLocationByPincode"
                                    type="text"
                                    name="pincode"
                                    id="pincode"
                                    maxlength="6"
                                    autocomplete="postal-code"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                                <div class="pincode-status absolute right-2 top-2">
                                    <span wire:loading wire:target="fetchLocationByPincode">
                                        <svg class="animate-spin h-4 w-4 text-sky-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            @error('pincode') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            <div id="pincode-message" class="mt-1 text-xs"></div>
                        </div>

                        <!-- City -->
                        <div class="sm:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <div class="mt-1">
                                <input wire:model="city" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm" readonly>
                            </div>
                            @error('city') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- State -->
                        <div class="sm:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <div class="mt-1">
                                <input wire:model="state" type="text" name="state" id="state" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm" readonly>
                            </div>
                            @error('state') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Notes -->
                        <div class="sm:col-span-6">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes for Doctor (Optional)</label>
                            <div class="mt-1">
                                <textarea wire:model.live="notes" id="notes" name="notes" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="mt-8 flex justify-between">
                        <button
                            wire:click="previousStep"
                            wire:loading.attr="disabled"
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                            onclick="showLoader('Going back...')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back
                            <span wire:loading wire:target="previousStep" class="ml-2">
                                <svg class="animate-spin h-4 w-4 text-gray-700 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                        <button
                            wire:click="nextStep"
                            wire:loading.attr="disabled"
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                            onclick="showLoader('Reviewing your appointment...')">
                            <span>Review</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span wire:loading wire:target="nextStep" class="ml-2">
                                <svg class="animate-spin h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <!-- STEP 3: Review Appointment -->
            @if($step === 3)
            <div class="bg-white rounded-xl shadow-sm">
                <div class="p-6 border-b border-gray-200 bg-sky-50 rounded-t-xl">
                    <h2 class="text-xl font-medium text-gray-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Review Your Appointment Details
                    </h2>
                    <p class="text-gray-500 mt-2">Please verify all details before confirming your appointment.</p>
                </div>

                <div class="p-6">
                    <!-- Doctor and Appointment Details -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2 mb-3">Appointment Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                @if($doctorDetails)
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-200 mr-4 flex-shrink-0">
                                        <img src="{{ $doctorDetails->image ? asset('storage/' . $doctorDetails->image): asset('images/default.jpg') }}" alt="Doctor" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">Doctor</p>
                                        <p class="font-medium text-gray-800">Dr. {{ $doctorDetails->user->name }}</p>
                                        <p class="text-sky-600 text-sm">{{ $doctorDetails->department->name }}</p>
                                    </div>
                                </div>
                                @endif

                                <div class="flex items-center mb-4">
                                    <div class="w-8 h-8 rounded-full bg-sky-100 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">Date</p>
                                        <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($appointmentDate)->format('l, F j, Y') }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-sky-100 flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 text-sm">Time</p>
                                        <p class="font-medium text-gray-800">{{ $appointmentTime }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <div class="flex justify-between items-center mb-3">
                                    <p class="text-gray-600">Consultation Fee</p>
                                    <p class="font-semibold text-gray-800">₹500</p>
                                </div>
                                <div class="flex justify-between items-center mb-3">
                                    <p class="text-gray-600">Payment Method</p>
                                    <p class="font-semibold text-gray-800 capitalize">{{ $payment_method }}</p>
                                </div>
                                <div class="border-t border-gray-200 pt-3 mt-2">
                                    <div class="flex justify-between items-center">
                                        <p class="font-medium text-gray-700">Total</p>
                                        <p class="font-bold text-gray-800">₹500</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">To be paid at the hospital</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patient Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2 mb-3">Patient Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <p class="text-sm text-gray-500">Full Name</p>
                                <p class="font-medium text-gray-800">{{ $name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Phone</p>
                                <p class="font-medium text-gray-800">{{ $phone }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium text-gray-800">{{ $email ?: 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Gender</p>
                                <p class="font-medium text-gray-800 capitalize">{{ $gender }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Address</p>
                                <p class="font-medium text-gray-800">{{ $address }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">City</p>
                                <p class="font-medium text-gray-800">{{ $city }}, {{ $state }} {{ $pincode }}</p>
                            </div>
                        </div>

                        @if($notes)
                        <div class="mt-4 p-4 bg-gray-50 rounded-md">
                            <p class="text-sm text-gray-500">Notes</p>
                            <p class="text-gray-800">{{ $notes }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Navigation -->
                    <div class="mt-8 flex justify-between">
                        <button
                            wire:click="previousStep"
                            wire:loading.attr="disabled"
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                            onclick="showLoader('Going back...')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Edit Details
                        </button>
                        <button
                            wire:click="bookAppointment"
                            wire:loading.attr="disabled"
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                            onclick="showLoader('Confirming your appointment...')">
                            <span>Confirm Booking</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span wire:loading wire:target="bookAppointment" class="ml-2">
                                <svg class="animate-spin h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            @endif

        <!-- STEP 4: Confirmation -->
        @if($step === 1)
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
    <!-- Responsive button container: flex-col (stacked) on mobile, flex-row (side by side) on sm screens and up -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-3 mb-6">
        <a
            href="{{ route('manage.appointments') }}"
            class="w-full sm:w-auto px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Manage Appointments
        </a>
        <button
            wire:click="downloadReceipt"
            class="w-full sm:w-auto px-6 py-2 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 transition-colors flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download Receipt
        </button>
    </div>

    <div class="mb-6 flex justify-center">
        <div class="bg-green-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Appointment Confirmed!</h2>
    <p class="text-gray-600 mb-6">Your appointment has been successfully booked.</p>

    <div class="bg-gray-50 p-6 rounded-lg border border-gray-100 mb-8 max-w-md mx-auto">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-500">Appointment ID:</span>
            <span class="font-semibold text-gray-800">#{{ $appointmentId }}</span>
        </div>
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-500">Date:</span>
            <span class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($appointmentDate)->format('D, d M Y') }}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-gray-500">Time:</span>
            <span class="font-semibold text-gray-800">{{ $appointmentTime }}</span>
        </div>
    </div>
</div>
        @endif
    </div>
    
  
</div>

    <style>
        /* Optional animation for the confirmation checkmark */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }

        .animate-pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Animation for transitions between steps */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Improved spinner animation */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        /* Progress step enhancements */
        @keyframes pulse-border {

            0%,
            100% {
                border-color: rgba(255, 255, 255, 0.9);
            }

            50% {
                border-color: rgba(255, 255, 255, 0.6);
            }
        }

        .animate-border-pulse {
            animation: pulse-border 2s ease-in-out infinite;
        }

        /* Step indicator styles */
        .rounded-full.border-4 {
            box-shadow: 0 0 0 2px rgba(14, 165, 233, 0.3);
        }

        /* Active step highlighting */
        @keyframes highlight {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* For steps that are currently active */
        .active-step {
            animation: highlight 1s ease-in-out;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle pincode status updates
            Livewire.on('pincode-fetched', function(data) {
                const messageElement = document.getElementById('pincode-message');
                const statusElement = document.querySelector('.pincode-status');

                if (data.success) {
                    messageElement.textContent = 'Location data fetched successfully';
                    messageElement.className = 'mt-1 text-xs text-green-600';

                    statusElement.innerHTML = '<svg class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                } else {
                    messageElement.textContent = data.message || 'Could not fetch location data';
                    messageElement.className = 'mt-1 text-xs text-red-600';

                    statusElement.innerHTML = '<svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
                }
            });

            // Show loader when Livewire is processing
            const loader = document.getElementById('fullpage-loader');

            Livewire.hook('message.sent', () => {
                loader.classList.remove('opacity-0', 'pointer-events-none');
            });

            Livewire.hook('message.processed', () => {
                setTimeout(() => {
                    loader.classList.add('opacity-0', 'pointer-events-none');
                }, 500); // Short delay for better UX
            });

            // Handle navigation events
            window.addEventListener('beforeunload', function() {
                loader.classList.remove('opacity-0', 'pointer-events-none');
            });
        });

        // Function to show the loader with custom message
        function showLoader(message = 'Loading...') {
            const loader = document.getElementById('fullpage-loader');
            const loadingText = document.querySelector('.loading-text');

            if (loadingText) {
                loadingText.textContent = message;
            }

            loader.classList.remove('opacity-0', 'pointer-events-none');
        }

        // Function to hide the loader
        function hideLoader() {
            const loader = document.getElementById('fullpage-loader');
            loader.classList.add('opacity-0', 'pointer-events-none');
        }

        // Auto-hide loader for step transitions and scroll to top
        document.addEventListener('livewire:init', function() {
            Livewire.on('stepChanged', function() {
                setTimeout(function() {
                    hideLoader();

                    // Scroll to the top of the page smoothly
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    // Add fade-in animation to the new step
                    const currentStep = document.querySelector(`[x-show="step === ${Livewire.store.get('step')}"]`);
                    if (currentStep) {
                        currentStep.classList.add('fade-in');
                    }
                }, 800);
            });
        });

        // Add animation to the active step
        document.addEventListener('livewire:load', function() {
            Livewire.on('stepChanged', function(data) {
                const step = data.step;
                const stepElements = document.querySelectorAll('.flex-col.items-center');

                // Add highlight animation to the current step
                if (step <= stepElements.length) {
                    stepElements[step - 1].querySelector('.rounded-full').classList.add('active-step');
                }
            });
        });
    </script>
</div>
