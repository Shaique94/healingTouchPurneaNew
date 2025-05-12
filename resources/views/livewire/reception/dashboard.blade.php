<div class="min-h-screen bg-gradient-to-br from-beige-50 to-gray-100 flex flex-col md:flex-row">

    @include('components.reception.sidebar')
    <main class="flex-1 p-6 space-y-6 overflow-y-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                    Welcome, <span class="text-beige-600 ml-2">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-sm text-gray-600 mt-1">Managing your reception dashboard</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-lg shadow-md text-sm text-gray-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-beige-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ now()->format('l, d M Y') }}
            </div>
        </div>


        <!-- Quick Actions -->
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <!-- Search Bar - Smaller and Left-Aligned -->
            <div class="relative w-full sm:w-64 md:w-80">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    type="text"
                    wire:model.live="search"
                    placeholder="Search patients..."
                    class="w-full pl-9 pr-3 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition duration-200 bg-white shadow-sm text-sm">
            </div>

            <!-- New Patient Button (no spacer in between) -->
            <div>
                <button
                    wire:click="openModal"
                    class="bg-beige-600 hover:bg-beige-700 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-200 flex items-center justify-center text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    New Patient
                </button>
            </div>
        </div>
        @if($showModal)
        <!-- Multi-step Logic -->
        @if($step === 1)
        <!-- STEP 1: Patient Information -->
        <div class="px-6 py-8 bg-white rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-beige-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Patient Information
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="group">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input id="name" type="text" wire:model="name" placeholder="Enter full name"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" type="email" wire:model="email" placeholder="Enter email"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input id="phone" type="text"
                            inputmode="numeric"
                            pattern="\d{10}"
                            maxlength="10"
                            minlength="10" wire:model="phone" placeholder="Enter phone number"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="dob" class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="dob" type="text" wire:model="dob" inputmode="text" pattern="\d{3}" maxlength="3" minlength="1" placeholder="Enter age" class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('dob') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <select id="gender" wire:model="gender"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none bg-white appearance-none transition-colors">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>

                        @error('gender') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="pincode" class="block text-sm font-medium text-gray-700 mb-2">Pincode</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input id="pincode" type="text" wire:model.live="pincode" placeholder="Enter pincode"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" inputmode="numeric"
                            pattern="\d{6}"
                            maxlength="6"
                            minlength="6" />
                        @error('pincode') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <input id="city" type="text" wire:model="city" placeholder="Enter city"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('city') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                        </div>
                        <input id="state" type="text" wire:model="state" placeholder="Enter state"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('state') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input id="country" type="text" wire:model="country" placeholder="Enter country"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('country') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="group">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 pt-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <textarea id="address" wire:model="address" placeholder="Enter address" rows="2"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors"></textarea>
                        @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button wire:click="nextStep"
                    class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-beige-400 to-beige-600 text-white rounded-lg hover:from-beige-600 hover:to-beige-700 transition shadow-md focus:ring-2 focus:ring-beige-500 focus:ring-offset-2 focus:outline-none">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        @elseif($step === 2)
        <!-- STEP 2: Appointment Details -->
        <div class="px-6 py-8 bg-white rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-beige-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-6h6v6h4V9l-7-6-7 6v8h4z" />
                </svg>
                Appointment Details
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Doctor Select -->
                <div class="group">
                    <label for="doctor_id" class="block text-sm font-medium text-beige-800 mb-2">Select Doctor</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-beige-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <select id="doctor_id" wire:model.lazy="doctor_id"
                            class="pl-10 w-full px-4 py-2 border border-beige-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none bg-beige-50 appearance-none transition-colors">
                            <option value="">Choose Doctor</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('doctor_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Appointment Date -->
                <div class="group">
                    <label for="appointment_date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="appointment_date" type="date" wire:model="appointment_date"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('appointment_date') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Time -->
                <div class="group">
                    <label for="appointment_time" class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input id="appointment_time" type="time" wire:model="appointment_time"
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none transition-colors" />
                        @error('time') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Notes -->
                <div class="group">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 pt-2 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <textarea id="notes" wire:model="notes" rows="3" placeholder="Optional notes..."
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-beige-500 focus:border-beige-500 focus:outline-none resize-none transition-colors"></textarea>
                        @error('notes') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <!--here we re adding mark as settled and amount field-->
            <div class="mb-4">
                <label class="block text-beige-800 text-sm font-medium mb-2">Amount</label>
                <div class="relative max-w-xs">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-beige-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <input
                        type="number"
                        wire:model="amount"
                        class="shadow-sm border border-beige-300 bg-beige-50 rounded-lg w-full py-2 pl-10 pr-3 text-beige-800 leading-tight focus:outline-none focus:ring-2 focus:ring-beige-500 focus:border-beige-500 transition duration-200"
                        placeholder="Doctor's Fees will auto-fill here">
                </div>
                @error('amount') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center mb-4">
                <input type="checkbox" wire:model="settlement" id="settlement" class="mr-2 leading-tight">
                <label for="settlement" class="text-sm text-gray-700">Mark as Settled</label>
            </div>


            <div class="flex justify-between mt-8">
                <button wire:click="backStep"
                    class="inline-flex items-center px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors shadow-md focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </button>

                <button wire:click="nextStep"
                    class="inline-flex items-center px-5 py-2.5 bg-beige-600 hover:bg-beige-700 text-white rounded-lg transition-colors shadow-md focus:ring-2 focus:ring-beige-500 focus:ring-offset-2 focus:outline-none">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        @elseif($step === 3)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-beige-600">
                <h3 class="text-xl font-bold text-white mb-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Review & Confirm Appointment
                </h3>
                <p class="text-beige-100 text-sm">Please verify all details before scheduling</p>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Patient Info Card -->
                    <div class="bg-white rounded-lg shadow border border-gray-100 overflow-hidden">
                        <div class="bg-beige-50 px-4 py-3 border-b border-gray-100">
                            <h4 class="text-beige-800 font-semibold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Patient Information
                            </h4>
                        </div>
                        <div class="p-4 space-y-3 text-gray-700">
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Name:</span>
                                <span>{{ $name }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Email:</span>
                                <span>{{ $email }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Phone:</span>
                                <span>{{ $phone }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">DOB:</span>
                                <span>{{ $dob }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Gender:</span>
                                <span>{{ $gender }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-24">Address:</span>
                                <span>{{ $address }}, {{ $city }}, {{ $state }}, {{ $country }} - {{ $pincode }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Appointment Info Card -->
                    <div class="bg-white rounded-lg shadow border border-gray-100 overflow-hidden">
                        <div class="bg-beige-50 px-4 py-3 border-b border-gray-100">
                            <h4 class="text-beige-800 font-semibold flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Appointment Details
                            </h4>
                        </div>
                        <div class="p-4 space-y-3 text-gray-700">
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Doctor:</span>
                                <span>{{ $doctor_name }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Date:</span>
                                <span>{{ $appointment_date }}</span>
                            </div>
                            <div class="flex border-b border-gray-100 pb-2">
                                <span class="font-medium w-24">Time:</span>
                                <span>{{ $appointment_time }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium w-24">Notes:</span>
                                <span>{{ $notes ?: 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-4 border-t border-gray-100">
                    <button
                        type="button"
                        wire:click="backStep"
                        class="inline-flex items-center justify-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back
                    </button>

                    <button
                        type="button"
                        wire:click="$set('showModal', false)"
                        class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </button>

                    <button
                        type="submit"
                        wire:click="save"
                        class="inline-flex items-center justify-center px-5 py-2.5 bg-beige-600 text-white rounded-lg hover:bg-beige-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Schedule Appointment
                    </button>
                </div>
            </div>
        </div>
        @elseif($step === 4)
        <!-- STEP 4: Confirmation page -->
        <div class="bg-white rounded-xl shadow-lg py-8 px-6 max-w-lg mx-auto">
            <!-- Success Icon with Animation -->
            <div class="mb-6">
                <div class="mx-auto h-20 w-20 rounded-full bg-green-100 flex items-center justify-center overflow-visible">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Appointment Scheduled!</h2>
                <p class="text-gray-600">Your appointment has been successfully booked. Thank you for choosing Healing Touch Hospital.</p>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 my-6"></div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a wire:navigate
                    wire:click.prevent="viewAppointment({{ $appointmentId }})"
                    target="_blank"
                    class="inline-flex items-center justify-center px-6 py-3 bg-beige-600 text-white rounded-lg hover:bg-beige-700 transition-colors duration-200 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download Receipt
                </a>

                <a wire:navigate href="{{ route('reception.dashboard') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-200 transition-colors duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
        @endif
        @endif

        @if(!$showModal)
        <!-- Today's Appointments -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <h2 class="text-lg font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Appointments
                </h2>

                <!-- Filter Buttons -->
                <div class="flex space-x-2 mt-3 sm:mt-0">
                    <button
                        wire:click="$refresh"
                        class="px-4 py-2 text-sm rounded-lg font-medium transition duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Refresh
                    </button>

                    <button
                        wire:click="filterByDate('today')"
                        class="px-4 py-2 text-sm rounded-lg font-medium transition duration-200
                            {{ $selectedDate === 'today' ? 'bg-beige-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Today
                    </button>

                    <button
                        wire:click="filterByDate('tomorrow')"
                        class="px-4 py-2 text-sm rounded-lg font-medium transition duration-200
                            {{ $selectedDate === 'tomorrow' ? 'bg-beige-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        Tomorrow
                    </button>
                    <input
                        type="date"
                        id="customDatePicker"
                        class="px-4 py-2 text-sm rounded-lg border border-gray-300 focus:ring focus:ring-beige-200 focus:outline-none"
                        wire:model.live="selectedDate">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase tracking-wider font-medium">
                        <tr>
                            <th class="px-6 py-3 text-left">Patient Name</th>
                            <th class="px-6 py-3 text-left">Phone</th>
                            <th class="px-6 py-3 text-left">Address</th>
                            <th class="px-6 py-3 text-left">City</th>
                            <th class="px-6 py-3 text-left">Assigned Doctor</th>
                            <th class="px-6 py-3 text-left">Payment Status</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($appointments as $appointment)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $appointment->patient->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $appointment->patient->phone }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $appointment->patient->address }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $appointment->patient->city }}</td>
                            <td class="px-6 py-4 text-gray-600">
                                {{ $appointment->doctor->user->name }} ({{$appointment->doctor->department->name}})
                            </td>
                            <td class="px-6 py-4">
                                @if($appointment->payment && $appointment->payment->status === 'due')
                                <span class="bg-red-100 text-red-700 py-1 px-3 rounded-md font-medium text-xs flex items-center inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Due
                                </span>
                                @else
                                <span class="bg-beige-100 text-beige-700 py-1 px-3 rounded-md font-medium text-xs flex items-center inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Paid
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <select wire:change="updateStatus({{ $appointment->id }}, $event.target.value)"
                                    class="form-select text-sm rounded-full border-gray-200 py-1
                                    @if($appointment->status === 'pending') bg-yellow-50 text-yellow-800
                                    @elseif($appointment->status === 'checked_in') bg-blue-50 text-blue-800
                                    @elseif($appointment->status === 'cancelled') bg-red-50 text-red-800
                                    @elseif($appointment->status === 'confirmed') bg-green-50 text-green-800
                                    @endif">
                                    <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="checked_in" {{ $appointment->status === 'checked_in' ? 'selected' : '' }}>Checked In</option>
                                    <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Payment Button -->
                                    @if ($appointment->status == 'confirmed' || $appointment->status == 'checked_in' || $appointment->status === 'cancelled')
                                    <button
                                        wire:click="$dispatch('open-payment', { id: {{ $appointment->id }} })"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-green-50 border border-green-200 rounded-md text-green-700 text-xs hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                                        </svg>
                                        Payment
                                    </button>

                                    <!-- Edit Button -->
                                    <button
                                        wire:click="editAppointment({{ $appointment->id }})"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-blue-50 border border-blue-200 rounded-md text-blue-700 text-xs hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        Edit
                                    </button>

                                    <!-- View PDF Button -->
                                    <a wire:navigate href="{{ route('reception.appointments', $appointment->id) }}"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-gray-50 border border-gray-200 rounded-md text-gray-700 text-xs hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                        </svg>
                                        View
                                    </a>
                                    @endif

                                    @if($appointment->status === 'pending')
                                    <!-- Cancel Button -->
                                    <button
                                        wire:click="confirm({{ $appointment->id }})"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-green-50 border border-green-200 rounded-md text-green-700 text-xs hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                        <svg class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 13L9 17L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        confirm
                                    </button>
                                    <button
                                        wire:click="cancelAppointment({{ $appointment->id }})"
                                        class="inline-flex items-center px-2.5 py-1.5 bg-red-50 border border-red-200 rounded-md text-red-700 text-xs hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                        Cancel
                                    </button>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @endforeach

                        @if(count($appointments) === 0)
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p>No appointments found for the selected day</p>
                                <p class="text-sm mt-1">Try another date or create a new appointment</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @if($editpatientModal)
        <livewire:reception.edit-appointment :appointmentId="$appointmentId" />
        @endif
        <livewire:reception.payment />


    </main>
    <audio id="notification-sound" src="{{ asset('sounds/notification.mp3') }}" preload="auto"></audio>
</div>