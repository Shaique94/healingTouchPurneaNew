<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-extrabold text-gray-800 sm:text-4xl">Book Your Appointment</h1>
            <p class="mt-3 text-xl text-gray-500 sm:mt-4">Schedule a visit with our expert doctors</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-10">
            <ol class="flex items-center w-full">
                <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                    <div class="{{ $step >= 1 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12">
                        @if($step > 1)
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        @else
                            <span>1</span>
                        @endif
                    </div>
                    <span class="ml-2 text-sm lg:text-base font-medium {{ $step >= 1 ? 'text-lime-600' : 'text-gray-500' }}">Select Doctor</span>
                </li>
                <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                    <div class="{{ $step >= 2 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12">
                        @if($step > 2)
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        @else
                            <span>2</span>
                        @endif
                    </div>
                    <span class="ml-2 text-sm lg:text-base font-medium {{ $step >= 2 ? 'text-lime-600' : 'text-gray-500' }}">Patient Details</span>
                </li>
                <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                    <div class="{{ $step >= 3 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12">
                        @if($step > 3)
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        @else
                            <span>3</span>
                        @endif
                    </div>
                    <span class="ml-2 text-sm lg:text-base font-medium {{ $step >= 3 ? 'text-lime-600' : 'text-gray-500' }}">Review & Confirm</span>
                </li>
                <li class="flex items-center">
                    <div class="{{ $step >= 4 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12">
                        <span>4</span>
                    </div>
                    <span class="ml-2 text-sm lg:text-base font-medium {{ $step >= 4 ? 'text-lime-600' : 'text-gray-500' }}">Confirmed</span>
                </li>
            </ol>
        </div>

        <!-- STEP 1: Select Doctor -->
        @if($step === 1)
        <div class="space-y-6">
            <!-- Department Filter -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-4">Select Department</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                    <button type="button" wire:click="$set('selectedDepartment', null)" class="px-4 py-2 rounded-md text-center text-sm font-medium transition-colors {{ $selectedDepartment === null ? 'bg-lime-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800' }}">
                        All Departments
                    </button>
                    
                    @foreach($departments as $department)
                        <button type="button" wire:click="$set('selectedDepartment', {{ $department->id }})" class="px-4 py-2 rounded-md text-center text-sm font-medium transition-colors {{ $selectedDepartment === $department->id ? 'bg-lime-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800' }}">
                            {{ $department->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            
            <!-- Doctors Grid -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-medium mb-4">Choose a Doctor</h2>
                
                @if(count($doctors) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($doctors as $doctor)
                            <div wire:click="selectDoctor({{ $doctor->id }})" 
                                class="border rounded-lg overflow-hidden cursor-pointer transition transform hover:-translate-y-1 hover:shadow-md {{ $selectedDoctor == $doctor->id ? 'ring-2 ring-lime-500 shadow-md' : '' }}">
                                <div class="relative bg-gray-200 h-48">
                                    <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-full h-full object-cover">
                                    
                                    @if($selectedDoctor == $doctor->id)
                                        <div class="absolute top-3 right-3 bg-lime-500 rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">Dr. {{ $doctor->user->name }}</h3>
                                    <p class="text-sm text-lime-600">{{ $doctor->department->name }}</p>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>MBBS, MD</span>
                                    </div>
                                    <div class="mt-1 flex justify-between items-center">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>₹500 Consultation Fee</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-12 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p>No doctors available for the selected department.</p>
                        <button wire:click="$set('selectedDepartment', null)" class="mt-4 text-lime-600 font-medium hover:text-lime-700">
                            View all departments
                        </button>
                    </div>
                @endif
            </div>
            
            @if($selectedDoctor)
                <!-- Date and Time Selection -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-medium mb-4">Choose Date and Time</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="appointment-date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input wire:model="appointmentDate" type="date" id="appointment-date" min="{{ date('Y-m-d') }}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500">
                            @error('appointmentDate')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="appointment-time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                            <select wire:model="appointmentTime" id="appointment-time" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500">
                                <option value="">Select Time</option>
                                @foreach($availableTimes as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>
                            @error('appointmentTime')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Navigation -->
            <div class="flex justify-end">
                <button wire:click="nextStep" @if(!$selectedDoctor) disabled @endif class="px-6 py-2 bg-lime-600 text-white rounded-md shadow-sm hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 disabled:opacity-50 disabled:cursor-not-allowed">
                    Continue to Patient Details
                </button>
            </div>
        </div>
        @endif

        <!-- STEP 2: Patient Details -->
        @if($step === 2)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <!-- Selected Doctor Details (on top) -->
            @if($doctorDetails)
            <div class="mb-6 pb-6 border-b border-gray-200">
                <h2 class="text-lg font-medium mb-4">Your Selected Doctor</h2>
                <div class="flex flex-col sm:flex-row items-start sm:items-center">
                    <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-200 mr-4 mb-4 sm:mb-0">
                        <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Dr. {{ $doctorDetails->user->name }}</h3>
                        <p class="text-sm text-lime-600">{{ $doctorDetails->department->name }}</p>
                        <div class="mt-1 flex items-center text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>MBBS, MD</span>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-auto">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-sm text-gray-500">Appointment Details</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($appointmentDate)->format('l, d F Y') }}</p>
                            <p class="font-medium">{{ $appointmentTime }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <h2 class="text-lg font-medium mb-4">Enter Your Details</h2>
            
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <div class="mt-1">
                        <input wire:model="name" type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="mt-1">
                        <input wire:model="email" type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <div class="mt-1">
                        <input wire:model="phone" type="tel" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Gender -->
                <div class="sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <div class="mt-1">
                        <select wire:model="gender" id="gender" name="gender" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
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
                        <input wire:model="dob" type="date" name="dob" id="dob" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('dob') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Address -->
                <div class="sm:col-span-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <div class="mt-1">
                        <input wire:model="address" type="text" name="address" id="address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('address') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Pincode -->
                <div class="sm:col-span-2">
                    <label for="pincode" class="block text-sm font-medium text-gray-700">PIN Code</label>
                    <div class="mt-1">
                        <input wire:model="pincode" type="text" name="pincode" id="pincode" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('pincode') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- City -->
                <div class="sm:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <div class="mt-1">
                        <input wire:model="city" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('city') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- State -->
                <div class="sm:col-span-2">
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <div class="mt-1">
                        <input wire:model="state" type="text" name="state" id="state" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    @error('state') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Notes -->
                <div class="sm:col-span-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700">Notes for Doctor (Optional)</label>
                    <div class="mt-1">
                        <textarea wire:model="notes" id="notes" name="notes" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500"></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="mt-8 flex justify-between">
                <button wire:click="previousStep" type="button" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    Back
                </button>
                <button wire:click="nextStep" type="button" class="px-6 py-2 bg-lime-600 text-white rounded-md shadow-sm hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    Review Appointment
                </button>
            </div>
        </div>
        @endif
        
        <!-- STEP 3: Review and Confirm -->
        @if($step === 3)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-medium mb-6">Review and Confirm Appointment</h2>
            
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h3 class="text-base font-medium text-gray-900 mb-4">Doctor and Appointment Details</h3>
                
                @if($doctorDetails)
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctorDetails->user->name }}" class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">Dr. {{ $doctorDetails->user->name }}</p>
                        <p class="text-sm text-lime-600">{{ $doctorDetails->department->name }}</p>
                        <p class="text-sm text-gray-500">MBBS, MD</p>
                    </div>
                    <div class="ml-auto">
                        <p class="text-sm text-gray-500">Consultation Fee</p>
                        <p class="text-base font-medium text-gray-900">₹500</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($appointmentDate)->format('l, d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Time</p>
                            <p class="font-medium">{{ $appointmentTime }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Location</p>
                            <p class="font-medium">Healing Touch Hospital, Purnea</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="border-b border-gray-200 pb-6 mb-6">
                <h3 class="text-base font-medium text-gray-900 mb-4">Patient Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Full Name</p>
                        <p class="font-medium">{{ $name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium">{{ $email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="font-medium">{{ $phone }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Gender</p>
                        <p class="font-medium">{{ ucfirst($gender ?? '') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date of Birth</p>
                        <p class="font-medium">{{ $dob ? \Carbon\Carbon::parse($dob)->format('d F Y') : '' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Address</p>
                        <p class="font-medium">{{ $address }}, {{ $city }}, {{ $state }} - {{ $pincode }}</p>
                    </div>
                </div>
                
                @if($notes)
                <div class="mt-4">
                    <p class="text-sm text-gray-500">Notes</p>
                    <p class="font-medium">{{ $notes }}</p>
                </div>
                @endif
            </div>
            
            <div class="mb-6">
                <h3 class="text-base font-medium text-gray-900 mb-4">Payment Method</h3>
                
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input wire:model="payment_method" type="radio" value="cash" class="h-4 w-4 text-lime-600 focus:ring-lime-500 border-gray-300">
                        <span class="ml-2 text-gray-700">Pay at Hospital</span>
                    </label>
                    <label class="flex items-center">
                        <input wire:model="payment_method" type="radio" value="online" class="h-4 w-4 text-lime-600 focus:ring-lime-500 border-gray-300">
                        <span class="ml-2 text-gray-700">Pay Online</span>
                    </label>
                </div>
            </div>
            
            <div class="bg-lime-50 border-l-4 border-lime-500 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-lime-700">
                            Please arrive 15 minutes before your appointment time. Bring any previous medical records if available. By confirming, you agree to our <a href="#" class="font-medium underline">terms and conditions</a>.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <div class="flex justify-between">
                <button wire:click="previousStep" type="button" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    Back
                </button>
                <button wire:click="bookAppointment" type="button" class="px-6 py-2 bg-lime-600 text-white rounded-md shadow-sm hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    Confirm Appointment
                </button>
            </div>
        </div>
        @endif
        
        <!-- STEP 4: Confirmation -->
        @if($step === 4)
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="w-16 h-16 bg-lime-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Appointment Confirmed!</h2>
            <p class="text-gray-600 mb-6">Your appointment has been successfully scheduled.</p>
            
            @if($doctorDetails)
            <div class="bg-gray-50 p-6 max-w-md mx-auto rounded-lg mb-6">
                <div class="mb-4">
                    <p class="text-sm text-gray-500">Appointment Reference</p>
                    <p class="font-bold text-gray-900">#{{ session('appointment_id') ?? '12345' }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div>
                        <p class="text-sm text-gray-500">Doctor</p>
                        <p class="font-medium">Dr. {{ $doctorDetails->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Department</p>
                        <p class="font-medium">{{ $doctorDetails->department->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date & Time</p>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($appointmentDate)->format('d M Y') }} at {{ $appointmentTime }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Patient</p>
                        <p class="font-medium">{{ $name }}</p>
                    </div>
                </div>
            </div>
            @endif
            
            <p class="text-gray-600 mb-8">
                A confirmation SMS and email will be sent to your registered mobile number and email address. 
                You can also download your appointment details for your records.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    Back to Home
                </a>
                <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-lime-600 hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download Appointment
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
