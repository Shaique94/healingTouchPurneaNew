<div class="py-8 px-4 md:px-8 bg-gray-50 mt-20">
    <div class="max-w-6xl mx-auto">
        <!-- Page Title -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Book Your Appointment</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Schedule a consultation with our expert doctors. Choose a specialist, select your preferred time, and provide your details.</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center justify-center space-x-4">
                <div class="flex items-center">
                    <div class="{{ $currentStep >= 1 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} w-8 h-8 rounded-full flex items-center justify-center font-bold">1</div>
                    <span class="ml-2 text-sm font-medium {{ $currentStep >= 1 ? 'text-lime-600' : 'text-gray-500' }}">Select Doctor</span>
                </div>
                <div class="flex-grow h-0.5 {{ $currentStep >= 2 ? 'bg-lime-600' : 'bg-gray-200' }}"></div>
                <div class="flex items-center">
                    <div class="{{ $currentStep >= 2 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} w-8 h-8 rounded-full flex items-center justify-center font-bold">2</div>
                    <span class="ml-2 text-sm font-medium {{ $currentStep >= 2 ? 'text-lime-600' : 'text-gray-500' }}">Your Details</span>
                </div>
                <div class="flex-grow h-0.5 {{ $currentStep >= 3 ? 'bg-lime-600' : 'bg-gray-200' }}"></div>
                <div class="flex items-center">
                    <div class="{{ $currentStep >= 3 ? 'bg-lime-600 text-white' : 'bg-gray-200 text-gray-700' }} w-8 h-8 rounded-full flex items-center justify-center font-bold">3</div>
                    <span class="ml-2 text-sm font-medium {{ $currentStep >= 3 ? 'text-lime-600' : 'text-gray-500' }}">Confirm</span>
                </div>
            </div>
        </div>

        <!-- Step 1: Select Doctor and Time -->
        @if ($currentStep == 1)
        <div>
            <!-- Department Filter -->
            <div class="mb-8 bg-white rounded-lg p-6 shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Select Department</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <button wire:click="$set('selectedDepartment', null)" 
                            class="py-2 px-4 rounded-md text-sm border transition-all duration-200 {{ $selectedDepartment === null ? 'bg-lime-600 text-white border-lime-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}">
                        All Departments
                    </button>
                    @foreach ($departments as $department)
                        <button wire:click="$set('selectedDepartment', {{ $department->id }})" 
                                class="py-2 px-4 rounded-md text-sm border transition-all duration-200 {{ $selectedDepartment == $department->id ? 'bg-lime-600 text-white border-lime-600' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' }}">
                            {{ $department->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            
            <!-- Doctor Selection -->
            <div class="bg-white rounded-lg p-6 shadow-md mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Select Doctor</h2>
                @if (count($availableDoctors) > 0 || $selectedDepartment === null)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($availableDoctors as $doctor)
                            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300 {{ $selectedDoctor == $doctor->id ? 'ring-2 ring-lime-500' : '' }}">
                                <div class="relative">
                                    <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-full h-48 object-cover">
                                    @if($selectedDoctor == $doctor->id)
                                        <div class="absolute top-2 right-2 bg-lime-500 text-white p-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-medium text-gray-800">Dr. {{ $doctor->user->name }}</h3>
                                    <p class="text-sm text-gray-500 mb-2">{{ $doctor->department->name }}</p>
                                    <div class="flex items-center text-sm text-gray-600 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>MBBS, MD (Medicine)</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>₹500 Consultation Fee</span>
                                    </div>
                                    <button wire:click="selectDoctor({{ $doctor->id }})" class="w-full bg-gradient-to-r from-lime-500 to-green-600 hover:from-lime-600 hover:to-green-700 text-white py-2 rounded-md transition-colors duration-300">
                                        {{ $selectedDoctor == $doctor->id ? 'Selected' : 'Select' }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p>No doctors found in this department. Please select another department.</p>
                    </div>
                @endif
            </div>
            
            <!-- Date and Time Selection -->
            <div class="bg-white rounded-lg p-6 shadow-md mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Choose Appointment Date & Time</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="appointment-date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input wire:model.live="selectedDate" type="date" id="appointment-date" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                        @error('selectedDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label for="appointment-time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <select wire:model="selectedTime" id="appointment-time" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                            <option value="">Select a time</option>
                            @foreach ($availableTimes as $time)
                                <option value="{{ $time }}">{{ $time }}</option>
                            @endforeach
                        </select>
                        @error('selectedTime') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex justify-end">
                <button wire:click="nextStep" type="button" class="px-6 py-2 bg-lime-600 text-white rounded-md hover:bg-lime-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                    Next Step
                </button>
            </div>
        </div>
        @endif

        <!-- Step 2: Patient Information -->
        @if ($currentStep == 2)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Your Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input wire:model="name" type="text" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input wire:model="email" type="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input wire:model="phone" type="tel" id="phone" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <select wire:model="gender" id="gender" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                    <input wire:model="dob" type="date" id="dob" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('dob') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input wire:model="address" type="text" id="address" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Pincode -->
                <div>
                    <label for="pincode" class="block text-sm font-medium text-gray-700 mb-1">PIN Code</label>
                    <input wire:model="pincode" type="text" id="pincode" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('pincode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- City -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input wire:model="city" type="text" id="city" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- State -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State</label>
                    <input wire:model="state" type="text" id="state" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('state') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Country -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                    <input wire:model="country" type="text" id="country" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500">
                    @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <!-- Notes -->
                <div class="md:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Additional Notes (Optional)</label>
                    <textarea wire:model="notes" id="notes" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-lime-500 focus:border-lime-500"></textarea>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-8">
                <button wire:click="previousStep" type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Previous
                </button>
                <button wire:click="nextStep" type="button" class="px-6 py-2 bg-lime-600 text-white rounded-md hover:bg-lime-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                    Next Step
                </button>
            </div>
        </div>
        @endif

        <!-- Step 3: Review and Confirm -->
        @if ($currentStep == 3)
        <div>
            <!-- Review Appointment Details -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Review Your Appointment Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-medium text-gray-800 mb-4">Doctor Information</h3>
                        @if($selectedDoctor)
                            @php
                                $doctor = \App\Models\Doctor::with(['user', 'department'])->find($selectedDoctor);
                            @endphp
                            <div class="flex items-start">
                                <img src="{{ asset('images/doctor-placeholder.jpg') }}" alt="Dr. {{ $doctor->user->name }}" class="w-20 h-20 object-cover rounded-md mr-4">
                                <div>
                                    <p class="font-medium text-gray-800">Dr. {{ $doctor->user->name }}</p>
                                    <p class="text-gray-600 text-sm">{{ $doctor->department->name }}</p>
                                    <p class="text-gray-600 text-sm">MBBS, MD (Medicine)</p>
                                    <p class="text-gray-600 text-sm mt-1">Consultation Fee: ₹500</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-800 mb-4">Appointment Details</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-800">{{ \Carbon\Carbon::parse($selectedDate)->format('l, F j, Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-800">{{ $selectedTime }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="my-6 border-gray-200">
                
                <h3 class="font-medium text-gray-800 mb-4">Patient Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Name</p>
                        <p class="font-medium text-gray-800">{{ $name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium text-gray-800">{{ $email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="font-medium text-gray-800">{{ $phone }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Gender</p>
                        <p class="font-medium text-gray-800">{{ ucfirst($gender ?? '') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Date of Birth</p>
                        <p class="font-medium text-gray-800">{{ $dob ? \Carbon\Carbon::parse($dob)->format('F j, Y') : '' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Address</p>
                        <p class="font-medium text-gray-800">{{ $address }}, {{ $city }}, {{ $state }} - {{ $pincode }}, {{ $country }}</p>
                    </div>
                    @if($notes)
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Notes</p>
                        <p class="font-medium text-gray-800">{{ $notes }}</p>
                    </div>
                    @endif
                </div>
                
                <hr class="my-6 border-gray-200">
                
                <!-- Payment Method -->
                <div>
                    <h3 class="font-medium text-gray-800 mb-4">Payment Method</h3>
                    <div class="space-y-3">
                        <label class="flex items-center space-x-3">
                            <input wire:model="payment_method" type="radio" value="cash" class="form-radio h-5 w-5 text-lime-600">
                            <span class="text-gray-700">Pay at Hospital</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input wire:model="payment_method" type="radio" value="online" class="form-radio h-5 w-5 text-lime-600">
                            <span class="text-gray-700">Pay Online</span>
                        </label>
                    </div>
                </div>
                
                <div class="mt-8">
                    <div class="bg-lime-50 border border-lime-200 rounded-md p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-lime-700">
                                    By confirming this appointment, you agree to our <a href="#" class="font-medium underline">terms and conditions</a>. Please arrive 15 minutes before your appointment time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <div class="flex justify-between">
                <button wire:click="previousStep" type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Previous
                </button>
                <button wire:click="submitForm" type="button" class="px-6 py-2 bg-lime-600 text-white rounded-md hover:bg-lime-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                    Confirm Appointment
                </button>
            </div>
        </div>
        @endif

        <!-- Step 4: Confirmation -->
        @if ($currentStep == 4)
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <div class="w-16 h-16 bg-lime-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Appointment Confirmed!</h2>
            <p class="text-gray-600 mb-6">Your appointment has been successfully scheduled.</p>
            
            <div class="bg-gray-50 rounded-lg p-6 max-w-md mx-auto mb-6 text-left">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Appointment Reference</p>
                    <p class="font-bold text-gray-800">#{{ session('appointmentId') ?? '12345' }}</p>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Doctor</p>
                    @if($selectedDoctor)
                        @php
                            $doctor = \App\Models\Doctor::with(['user'])->find($selectedDoctor);
                        @endphp
                        <p class="font-medium text-gray-800">Dr. {{ $doctor->user->name }}</p>
                    @endif
                </div>
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Date & Time</p>
                    <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($selectedDate)->format('M d, Y') }} at {{ $selectedTime }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-500">Location</p>
                    <p class="font-medium text-gray-800">Healing Touch Hospital, Purnea</p>
                </div>
            </div>
            
            <p class="text-gray-600 mb-8">
                A confirmation has been sent to your email address. Please keep this information for your records.
            </p>
            
            <div class="flex justify-center space-x-4">
                <a href="/" class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors duration-300">
                    Return to Home
                </a>
                <button class="px-6 py-2 bg-lime-600 text-white rounded-md hover:bg-lime-700 transition-colors duration-300">
                    Download Appointment
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
