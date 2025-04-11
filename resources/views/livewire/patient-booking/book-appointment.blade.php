<div>
    <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 mt-16">
        <div class="max-w-5xl mx-auto">
            <!-- Page Header with Gradient Background -->
            <div class="mb-10 bg-gradient-to-r from-sky-600 to-sky-800 rounded-xl py-8 px-6 text-white shadow-lg">
                <h1 class="text-2xl md:text-3xl font-bold">Book Your Appointment</h1>
                <p class="mt-2 text-sky-100">Complete the steps below to schedule your visit with our specialists</p>

                <!-- Progress Steps -->
                <div class="mt-8">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col items-center">
                            <div class="{{ $step >= 1 ? 'bg-white text-sky-700' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300">
                                @if($step > 1)
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                1
                                @endif
                            </div>
                            <span class="mt-2 text-xs font-medium text-white">Doctor</span>
                        </div>

                        <div class="flex-grow mx-2 h-1 bg-sky-300 rounded relative">
                            <div class="absolute top-0 left-0 h-full bg-white rounded transition-all duration-500"
                                style="width: {{ ($step-1) * 50 }}%"></div>
                        </div>


                        <div class="flex flex-col items-center">
                            <div class="{{ $step >= 2 ? 'bg-white text-sky-700' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300">
                                @if($step > 2)
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                2
                                @endif
                            </div>
                            <span class="mt-2 text-xs font-medium text-white">Details</span>
                        </div>

                        <div class="flex-grow mx-2 h-1 bg-sky-300 rounded relative">
                            <div class="absolute top-0 left-0 h-full bg-white rounded transition-all duration-500"
                                style="width: {{ ($step-2) * 100 }}%"></div>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="{{ $step >= 3 ? 'bg-white text-sky-700' : 'bg-sky-700 text-white border-2 border-sky-300' }} 
                            w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300">
                                @if($step > 3)
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                @else
                                3
                                @endif
                            </div>
                            <span class="mt-2 text-xs font-medium text-white">Review</span>
                        </div>
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
                    @if (session()->has('error'))
                    <div class="text-xs text-yellow-600" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if(count($doctors) > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($doctors as $doctor)
                        <div wire:click="{{ $doctor->status == 1 ? 'selectDoctor(' . $doctor->id . ')' : 'DoctorNotAvailable(' . $doctor->id . ')' }}"
                            class="relative flex flex-col h-full border rounded-lg overflow-hidden cursor-pointer transition-all duration-300
                                {{ $selectedDoctor == $doctor->id ? 'ring-2 ring-sky-500 bg-sky-50' : 'hover:shadow-md' }}">

                            <div class="flex items-center p-3 border-b">
                                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                                    <img src="{{ asset($doctor?->image ?'storage/'.$doctor->image : 'images/default.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex flex-col">
                                    <div class="ml-3">
                                        <h3 class="text-sm font-semibold text-gray-900 line-clamp-1">Dr. {{ $doctor->user->name }}</h3>
                                        <p class="text-xs text-sky-600">{{ $doctor->department->name }}</p>
                                    </div>
                                    <span class="inline-block text-[9px] font-semibold mt-1 px-6 py-0.5 rounded-full 
    {{ $doctor->status == 1 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                        {{ $doctor->status == 1 ? 'Available' : 'Not Available' }}
                                    </span>
                                </div>

                            </div>


                            <div class="p-3 text-xs text-gray-600 space-y-2 flex-grow">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    {{ is_array($doctor->qualification) ? implode(', ', $doctor->qualification) : '-'  }}
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    ₹{{ $doctor->fee }}
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ implode(', ', $doctor->available_days ?? ['Mon', 'Wed', 'Fri']) }}
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="appointment-date" class="block text-sm font-medium text-gray-700 mb-1">Appointment Date</label>
                            <input
                                wire:model="appointmentDate"
                                type="date"
                                id="appointment-date"
                                min="{{ date('Y-m-d') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                            @error('appointmentDate')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="appointment-time" class="block text-sm font-medium text-gray-700 mb-1">Appointment Time</label>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach($availableTimes as $time)
                                <button
                                    type="button"
                                    wire:click="$set('appointmentTime', '{{ $time }}')"
                                    class="py-2 px-2 text-sm font-medium rounded-md border transition-colors
                                        {{ $appointmentTime === $time ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}">
                                    {{ $time }}
                                </button>
                                @endforeach
                            </div>
                            @error('appointmentTime')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                @endif

                <!-- Navigation -->
                <div class="flex justify-end">
                    <button
                        wire:click="nextStep"
                        @if(!$selectedDoctor) disabled @endif
                        class="px-6 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 disabled:opacity-50 disabled:cursor-not-allowed flex items-center">
                        <span>Continue</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
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
                        <img src="{{ asset($doctorDetails->image ? 'storage/'.$doctorDetails->image :'images/default.jpg' ) }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-full h-full object-cover">
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
                                <input wire:model="name" type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
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
                            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
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
                            <div class="mt-1">
                                <input wire:model="pincode" type="text" name="pincode" id="pincode" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('pincode') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- City -->
                        <div class="sm:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <div class="mt-1">
                                <input wire:model="city" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
                            </div>
                            @error('city') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- State -->
                        <div class="sm:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <div class="mt-1">
                                <input wire:model="state" type="text" name="state" id="state" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">
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
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back
                        </button>
                        <button
                            wire:click="nextStep"
                            type="button"
                            class="inline-flex items-center px-5 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            <span>Review</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <!-- STEP 3: Review and Confirm -->
            @if($step === 3)
            <div class="bg-white rounded-xl shadow-sm p-5">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-sky-100 text-sky-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Review and Confirm Your Appointment</h2>
                    <p class="text-gray-500 mt-1">Please review your appointment details before confirming</p>
                </div>

                <div class="border border-gray-200 rounded-lg mb-6 overflow-hidden">
                    <div class="bg-sky-50 px-5 py-4 flex items-center border-b border-gray-200">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center text-sky-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Doctor Information</h3>
                            @if($doctorDetails)
                            <p class="text-gray-600 text-sm">Dr. {{ $doctorDetails->user->name }} • {{ $doctorDetails->department->name }}</p>
                            @endif
                        </div>
                        <div class="ml-auto text-right">
                            <button
                                wire:click="previousStep"
                                type="button"
                                class="text-sm text-sky-600 font-medium hover:text-sky-700 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Change
                            </button>
                        </div>
                    </div>

                    @if($doctorDetails)
                    <div class="px-5 py-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-16 h-16 rounded-full object-cover">
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-900">Dr. {{ $doctorDetails->user->name }}</p>
                                <p class="text-sm text-sky-600">{{ $doctorDetails->department->name }}</p>
                                <p class="text-sm text-gray-500 mt-1">MBBS, MD (Medicine)</p>

                                <div class="mt-3 grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 px-3 py-2 rounded-md">
                                        <p class="text-xs text-gray-500">Date</p>
                                        <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($appointmentDate)->format('l, d M Y') }}</p>
                                    </div>
                                    <div class="bg-gray-50 px-3 py-2 rounded-md">
                                        <p class="text-xs text-gray-500">Time</p>
                                        <p class="font-medium text-gray-800">{{ $appointmentTime }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-auto text-right">
                                <p class="text-xs text-gray-500">Consultation Fee</p>
                                <p class="text-xl font-bold text-gray-900">₹500</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="border border-gray-200 rounded-lg mb-6 overflow-hidden">
                    <div class="bg-sky-50 px-5 py-4 flex items-center border-b border-gray-200">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center text-sky-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Patient Information</h3>
                            <p class="text-gray-600 text-sm">{{ $name }} • {{ $phone }}</p>
                        </div>
                        <div class="ml-auto text-right">
                            <button
                                wire:click="$set('step', 2)"
                                type="button"
                                class="text-sm text-sky-600 font-medium hover:text-sky-700 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Edit
                            </button>
                        </div>
                    </div>

                    <div class="px-5 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Full Name</p>
                                    <p class="font-medium">{{ $name }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="font-medium">{{ $email }}</p>
                                </div>
                                <div class="mb-4 md:mb-0">
                                    <p class="text-sm text-gray-500">Phone</p>
                                    <p class="font-medium">{{ $phone }}</p>
                                </div>
                            </div>

                            <div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Gender</p>
                                    <p class="font-medium">{{ ucfirst($gender ?? '') }}</p>
                                </div>
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Date of Birth</p>
                                    <p class="font-medium">{{ $dob ? \Carbon\Carbon::parse($dob)->format('d F Y') : '' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Address</p>
                                    <p class="font-medium">{{ $address }}, {{ $city }}, {{ $state }} - {{ $pincode }}</p>
                                </div>
                            </div>
                        </div>

                        @if($notes)
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-500">Notes</p>
                            <p class="font-medium">{{ $notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg mb-6 overflow-hidden">
                    <div class="bg-sky-50 px-5 py-4 flex items-center border-b border-gray-200">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center text-sky-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Payment Method</h3>
                        </div>
                    </div>

                    <div class="px-5 py-4">
                        <div class="space-y-3">
                            <label class="flex items-center p-3 border border-gray-200 rounded-md hover:bg-gray-50 cursor-pointer">
                                <input wire:model="payment_method" type="radio" value="cash" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300">
                                <div class="ml-3">
                                    <span class="font-medium text-gray-800">Pay at Hospital</span>
                                    <p class="text-sm text-gray-500">Pay the consultation fee at the hospital reception</p>
                                </div>
                            </label>
                            <label class="flex items-center p-3 border border-gray-200 rounded-md hover:bg-gray-50 cursor-pointer">
                                <input wire:model="payment_method" type="radio" value="online" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300">
                                <div class="ml-3">
                                    <span class="font-medium text-gray-800">Pay Online</span>
                                    <p class="text-sm text-gray-500">Pay securely using Credit/Debit card, UPI, or Net Banking</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bg-sky-50 border-l-4 border-sky-500 p-4 mb-6 rounded-r-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-sky-700">
                                Please arrive 15 minutes before your appointment time. Bring any previous medical records if available. By confirming, you agree to our <a href="#" class="font-medium underline">terms and conditions</a>.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between">
                    <button
                        wire:click="previousStep"
                        type="button"
                        class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back
                    </button>
                    <button
                        wire:click="bookAppointment"
                        type="button"
                        class="inline-flex items-center px-5 py-2.5 bg-sky-600 text-white rounded-md shadow-sm hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        <span>Confirm Appointment</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </div>
            @endif

            <!-- STEP 4: Confirmation -->
            @if($step === 4)
            <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Appointment Confirmed!</h2>
                <p class="text-gray-600 mb-8">Your appointment has been successfully scheduled.</p>

                @if($doctorDetails)
                <div class="bg-gray-50 p-6 max-w-md mx-auto rounded-lg border border-gray-200 mb-8">
                    <div class="text-right mb-4">
                        <div class="inline-block py-1 px-3 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            Confirmed
                        </div>
                    </div>

                    <div class="flex items-center mb-4 pb-4 border-b border-dashed border-gray-200">
                        <div class="flex-shrink-0">
                            <img src="{{ asset($doctorDetails->image ?'storage/'.$doctorDetails->image : 'public/default.jpg') }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-12 h-12 rounded-full object-cover">
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500">Appointment with</p>
                            <p class="font-semibold">Dr. {{ $doctorDetails->user->name }}</p>
                            <p class="text-xs text-sky-600">{{ $doctorDetails->department->name }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-left mb-4">
                        <div>
                            <p class="text-xs text-gray-500">Appointment ID</p>
                            <p class="font-semibold">{{ session('appointment_id') ?? 'HTH-' . rand(10000, 99999) }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Fee</p>
                            <p class="font-semibold">₹500</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Date & Time</p>
                            <p class="font-semibold">{{ \Carbon\Carbon::parse($appointmentDate)->format('d M Y') }} at {{ $appointmentTime }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Patient</p>
                            <p class="font-semibold">{{ $name }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-4 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-500">Healing Touch Hospital, Purnea</span>
                    </div>
                </div>
                @endif

                <p class="text-gray-600 mb-8">
                    A confirmation has been sent to your email address and phone number.
                    <br>Please arrive 15 minutes before your scheduled appointment time.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/" class="inline-flex justify-center py-2.5 px-5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Back to Home
                    </a>
                    <button wire:click="downloadReceipt" type="button" class="inline-flex justify-center py-2.5 px-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Appointment
                    </button>
                </div>
            </div>
            @endif
        </div>

        <!-- Whatsapp Support Button -->
        <div class="fixed bottom-6 right-6">
            <a href="https://wa.me/919876543210" target="_blank" class="flex items-center justify-center w-14 h-14 rounded-full bg-green-500 text-white shadow-lg hover:bg-green-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                </svg>
            </a>
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
    </style>

</div>