<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 mt-16">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header with Gradient Background -->
        <div class="mb-10 bg-gradient-to-r from-sky-600 to-sky-800 rounded-xl py-8 px-6 text-white shadow-lg">
            <h1 class="text-2xl md:text-3xl font-bold">Manage Your Appointments</h1>
            <p class="mt-2 text-sky-100">Find your existing appointments or schedule a new one</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Find Existing Appointments Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-sky-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Find Your Appointment</h2>
                </div>

                <!-- Search Inputs -->
                <div class="mb-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <label class="flex items-center">
                            <input type="radio" wire:model="searchMethod" value="phone" class="form-radio h-4 w-4 text-sky-600">
                            <span class="ml-2 text-gray-700">Search by Phone</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="searchMethod" value="email" class="form-radio h-4 w-4 text-sky-600">
                            <span class="ml-2 text-gray-700">Search by Email</span>
                        </label>
                    </div>

                    @if($searchMethod === 'phone')
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <div class="relative">
                            <input 
                                wire:model="phone" 
                                type="tel" 
                                id="phone" 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 pl-10 sm:text-sm" 
                                placeholder="Enter your phone number"
                            >
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                        @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    @elseif($searchMethod === 'email')
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <input 
                                wire:model="email" 
                                type="email" 
                                id="email" 
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 pl-10 sm:text-sm" 
                                placeholder="Enter your email address"
                            >
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                        </div>
                        @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    @endif

                    <button 
                        wire:click="findAppointments" 
                        type="button" 
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Find My Appointments
                        <span wire:loading wire:target="findAppointments" class="ml-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Results Section -->
                @if($searchPerformed)
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="font-medium text-gray-900 mb-3">Search Results</h3>
                        
                        @if($noResultsFound)
                            <div class="bg-gray-50 rounded-md p-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-gray-600">No appointments found. Please check your information or book a new appointment.</p>
                            </div>
                        @else
                            <div class="overflow-hidden border border-gray-200 rounded-md shadow-sm max-h-80 overflow-y-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50 sticky top-0">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ref ID</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($searchResults as $result)
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $result['reference_id'] }}
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($result['appointment_date'])->format('d M Y') }}
                                                    <br>
                                                    <span class="text-xs">{{ $result['appointment_time'] }}</span>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                                    Dr. {{ $result['doctor_name'] }}
                                                    <br>
                                                    <span class="text-xs text-sky-600">{{ $result['department'] }}</span>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    @if($result['status'] === 'confirmed')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Completed
                                                        </span>
                                                    @elseif($result['status'] === 'cancelled')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Cancelled
                                                        </span>
                                                    @else
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-sky-100 text-sky-800">
                                                            Scheduled
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                                    <button 
                                                        wire:click="downloadReceipt('{{ $result['id'] }}')" 
                                                        class="text-sky-600 hover:text-sky-900 flex items-center justify-end"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                        </svg>
                                                        Receipt
                                                        <span wire:loading wire:target="downloadReceipt('{{ $result['id'] }}')" class="ml-1">
                                                            <svg class="animate-spin h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Book New Appointment Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-sky-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Book a New Appointment</h2>
                </div>
                
                <div class="flex flex-col items-center justify-center py-2 px-4 text-center">
                    <!-- Replace missing image with inline SVG calendar illustration -->
                    <div class="w-40 h-40 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-full h-full text-sky-600">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" class="text-sky-200 fill-sky-50"/>
                            <path d="M3 10H21" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 2L8 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M16 2L16 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <!-- Calendar dates -->
                            <circle cx="8" cy="14" r="1.5" fill="currentColor" class="text-sky-500"/>
                            <circle cx="12" cy="14" r="1.5" fill="currentColor" class="text-sky-400"/>
                            <circle cx="16" cy="14" r="1.5" fill="currentColor" class="text-sky-300"/>
                            <circle cx="8" cy="18" r="1.5" fill="currentColor" class="text-sky-300"/>
                            <circle cx="12" cy="18" r="1.5" fill="currentColor" class="text-sky-500"/>
                            <circle cx="16" cy="18" r="1.5" fill="currentColor" class="text-sky-400"/>
                            <!-- Add a plus sign to indicate appointment booking -->
                            <path d="M12 12.5V15.5M10.5 14H13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="text-green-500"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Ready to schedule your visit?</h3>
                    <p class="text-gray-600 mb-8">Book an appointment with our specialists and get the quality care you deserve.</p>
                    
                    <a href="{{ route('book.appointment') }}" class="px-6 py-3 bg-gradient-to-r from-sky-600 to-sky-800 hover:from-sky-700 hover:to-sky-900 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Book New Appointment
                    </a>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4 mt-4">
                    <h4 class="font-medium text-gray-800 mb-2">Why Choose Healing Touch Hospital?</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-sky-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Expert doctors with years of experience</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-sky-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">State-of-the-art medical facilities</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-sky-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Convenient online appointment booking</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
