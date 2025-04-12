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
    <div class="max-w-5xl mx-auto">
        <!-- Page Header with Gradient Background -->
        <div class="mb-10 bg-gradient-to-r from-sky-600 to-sky-800 rounded-xl py-8 px-6 text-white shadow-lg">
            <h1 class="text-2xl md:text-3xl font-bold">Book Your Appointment</h1>
            <p class="mt-2 text-sky-100">Complete the steps below to schedule your visit with our specialists</p>
            
            <!-- Add this right after the Page Header with Gradient Background section -->
            <div class="text-right mb-6">
                <a href="{{ route('manage.appointments') }}" class="inline-flex items-center text-sky-600 hover:text-sky-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Already have an appointment? Check status or download receipt
                </a>
            </div>

            <!-- Improved Progress Steps -->
            <div class="mt-8 relative">
                <!-- Progress Bar Background -->
                <div class="absolute top-5 left-0 right-0 h-1 bg-sky-300 rounded-full z-0 mx-12"></div>
                
                <!-- Active Progress Bar -->
                <div class="absolute top-5 left-0 h-1 bg-white rounded-full z-10 transition-all duration-500 mx-12"
                     style="width: {{ $step == 4 ? '90%' : min(90, ($step-1) * 30) }}%"></div>
                
                <!-- Step Indicators -->
                <div class="flex items-center justify-between relative z-20">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div class="{{ $step >= 1 ? 'bg-white text-sky-700 border-4 border-white' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shadow-md">
                            @if($step > 1)
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @else
                                1
                            @endif
                        </div>
                        <span class="mt-2 text-xs font-medium text-white">Doctor</span>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div class="{{ $step >= 2 ? 'bg-white text-sky-700 border-4 border-white' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shadow-md">
                            @if($step > 2)
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @else
                                2
                            @endif
                        </div>
                        <span class="mt-2 text-xs font-medium text-white">Details</span>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div class="{{ $step >= 3 ? 'bg-white text-sky-700 border-4 border-white' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shadow-md">
                            @if($step > 3)
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @else
                                3
                            @endif
                        </div>
                        <span class="mt-2 text-xs font-medium text-white">Review</span>
                    </div>
                    
                    <!-- Step 4 (Confirmation) - Only visible at step 4 -->
                    @if($step >= 4)
                    
                    @endif
                </div>
            </div>
        </div>

        <!-- STEP 1: Select Doctor -->
        @if($step === 1)
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
                <h2 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Choose a Doctor
                </h2>
                
                @if(count($doctors) > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($doctors as $doctor)
                            <div wire:click="selectDoctor({{ $doctor->id }})" 
                                class="relative flex flex-col h-full border rounded-lg overflow-hidden cursor-pointer transition-all duration-300
                                {{ $selectedDoctor == $doctor->id ? 'ring-2 ring-sky-500 bg-sky-50' : 'hover:shadow-md' }}">
                                
                                <div class="flex items-center p-3 border-b">
                                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                                        <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-full h-full object-cover">
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
                                        MBBS, MD
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        ₹500 Fee
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <div class="px-3 pb-3">
                                    <button class="w-full py-1.5 text-xs font-medium rounded-md transition-colors
                                        {{ $selectedDoctor == $doctor->id ? 'bg-sky-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                                        {{ $selectedDoctor == $doctor->id ? 'Selected' : 'Select Doctor' }}
                                    </button>
                                </div>
                                
                                @if($selectedDoctor == $doctor->id)
                                    <div class="absolute top-2 right-2 bg-sky-500 rounded-full p-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                @endif
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
                                class="py-3 px-6 border-b-2 font-medium text-sm focus:outline-none {{ $appointmentDate == date('Y-m-d') ? 'border-sky-600 text-sky-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}"
                            >
                                Today
                                <span class="text-xs block text-gray-500">{{ date('d M') }}</span>
                            </button>
                            <button 
                                wire:click="selectDateTab('tomorrow')" 
                                wire:loading.class="opacity-50"
                                wire:target="selectDateTab"
                                type="button"
                                class="py-3 px-6 border-b-2 font-medium text-sm focus:outline-none {{ $appointmentDate == date('Y-m-d', strtotime('+1 day')) ? 'border-sky-600 text-sky-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}"
                            >
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
                                    {{ $appointmentTime === $time ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}"
                                >
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
                                            class="mt-2 text-sm text-sky-600 hover:underline"
                                        >
                                            Check tomorrow's availability
                                        </button>
                                    @else
                                        <button 
                                            wire:click="selectDateTab('today')" 
                                            class="mt-2 text-sm text-sky-600 hover:underline"
                                        >
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
                    <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-full h-full object-cover">
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
                    <p class="text-lg font-medium text-gray-900">₹500</p>
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
                            <input wire:model="name" type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                        </div>
                        @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email -->
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-gray-500 text-xs">(optional)</span></label>
                        <div class="mt-1">
                            <input wire:model="email" type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                        </div>
                        @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Phone -->
                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <div class="mt-1">
                            <input wire:model="phone" type="tel" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                        </div>
                        @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Gender -->
                    <div class="sm:col-span-3">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <div class="mt-1">
                            <select wire:model="gender" id="gender" name="gender" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
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
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth <span class="text-gray-500 text-xs">(optional)</span></label>
                        <div class="mt-1">
                            <input wire:model="dob" type="date" name="dob" id="dob" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                        </div>
                        @error('dob') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Address -->
                    <div class="sm:col-span-6">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <div class="mt-1">
                            <input wire:model="address" type="text" name="address" id="address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
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
                                autocomplete="postal-code" 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                            >
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
                            <textarea wire:model="notes" id="notes" name="notes" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"></textarea>
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
                                    <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Doctor" class="w-full h-full object-cover">
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
        @if($step === 4)
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
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
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button 
                    wire:click="downloadReceipt"
                    class="px-6 py-2 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 transition-colors flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Download Receipt
                </button>
                <a 
                    href="{{ route('manage.appointments') }}" 
                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Manage Appointments
                </a>
            </div>
        </div>
        @endif
    </div>
    
    <!-- Whatsapp Support Button -->
    <div class="fixed bottom-6 right-6">
        <a href="https://wa.me/919876543210" target="_blank" class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500 text-white shadow-lg hover:bg-green-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
        </a>
    </div>
</div>

<style>
    /* Optional animation for the confirmation checkmark */
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }
    .animate-pulse {
        animation: pulse 2s ease-in-out infinite;
    }
    
    /* Animation for transitions between steps */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    
    /* Improved spinner animation */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .animate-spin {
        animation: spin 1s linear infinite;
    }

    /* Progress step enhancements */
    @keyframes pulse-border {
        0%, 100% { border-color: rgba(255, 255, 255, 0.9); }
        50% { border-color: rgba(255, 255, 255, 0.6); }
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
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
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
    
    // Auto-hide loader for step transitions
    document.addEventListener('livewire:load', function() {
        Livewire.on('stepChanged', function() {
            setTimeout(function() {
                hideLoader();
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
            if(step <= stepElements.length) {
                stepElements[step-1].querySelector('.rounded-full').classList.add('active-step');
            }
        });
    });
</script>
</div>