<div class="min-h-screen bg-gray-50 py-12 px-2 sm:px-6 lg:px-8 mt-16">
    <div class="max-w-8xl mx-auto">
        <!-- Page Header with Gradient Background -->
        <div class="mb-6 sm:mb-10 bg-gradient-to-r from-beige-600 to-beige-800 rounded-xl py-6 sm:py-8 px-4 sm:px-6 text-white shadow-lg">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold">Manage Your Appointments</h1>
            <p class="mt-2 text-sm sm:text-base text-beige-100">Find your existing appointments or schedule a new one</p>
        </div>

        <!-- Grid Container -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-8">
            <!-- Booking Section -->
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-beige-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Book a New Appointment</h2>
                </div>
                <div class="flex flex-col items-center  col-span-2 justify-center py-2 px-4 text-center">
                    <!-- Replace missing image with inline SVG calendar illustration -->
                    <div class="flex flex-col items-center space-y-4 mb-6">
                        <div class="w-28 h-28 bg-gradient-to-r from-beige-600 to-beige-800 rounded-full flex items-center justify-center shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-16 h-16 text-white">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2" class="text-beige-200 fill-beige-50" />
                                <path d="M3 10H21" stroke="currentColor" stroke-width="2" />
                                <path d="M8 2L8 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M16 2L16 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <circle cx="8" cy="14" r="1.5" fill="currentColor" class="text-beige-500" />
                                <circle cx="12" cy="14" r="1.5" fill="currentColor" class="text-beige-400" />
                                <circle cx="16" cy="14" r="1.5" fill="currentColor" class="text-beige-300" />
                                <circle cx="8" cy="18" r="1.5" fill="currentColor" class="text-beige-300" />
                                <circle cx="12" cy="18" r="1.5" fill="currentColor" class="text-beige-500" />
                                <circle cx="16" cy="18" r="1.5" fill="currentColor" class="text-beige-400" />
                                <path d="M12 12.5V15.5M10.5 14H13.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="text-green-500" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-gray-900">Schedule Your Visit for Tommorow</h3>
                            <p class="text-gray-600">Take the first step towards better health by booking an appointment with our specialists.</p>
                        </div>
                        <a wire:navigate href="{{ route('book.appointment') }}" class="px-8 py-3 bg-gradient-to-r from-beige-600 to-beige-800 hover:from-beige-700 hover:to-beige-900 text-white font-medium rounded-full shadow-md hover:shadow-lg transition-all duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Book Appointment
                        </a>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mt-4">
                    <h4 class="font-medium text-gray-800 mb-2">Why Choose Healing Touch Hospital?</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-beige-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Expert doctors with years of experience</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-beige-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">State-of-the-art medical facilities</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-beige-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-gray-600">Convenient online appointment booking</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Find Existing Appointments Section -->
            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6 col-span-2">
                <div class="flex items-center mb-6">
                    <div class="bg-beige-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Find Your Appointment</h2>
                </div>

                <!-- Search Inputs -->
                <form wire:submit.prevent="findAppointments" class="w-full sm:w-full md:w-full lg:w-full">
                    <div class="mb-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <label class="flex items-center">
                                <input type="radio" wire:model="searchMethod" value="phone" class="form-radio h-4 w-4 text-beige-600">
                                <span class="ml-2 text-gray-700">Search by Phone</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" wire:model="searchMethod" value="email" class="form-radio h-4 w-4 text-beige-600">
                                <span class="ml-2 text-gray-700">Search by Email</span>
                            </label>
                        </div>

                        @if($searchMethod === 'phone')
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <input
                                    wire:model.live="phone"
                                    type="tel"
                                    id="phone"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-beige-500 focus:ring-beige-500 pl-10 sm:text-sm"
                                    placeholder="Enter your phone number">
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
                                    wire:model.live="email"
                                    type="email"
                                    id="email"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-beige-500 focus:ring-beige-500 pl-10 sm:text-sm"
                                    placeholder="Enter your email address">
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
                            type="submit"
                            class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-beige-600 hover:bg-beige-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-500 flex items-center justify-center">
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
                </form>

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
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 sticky top-0">
                                    <tr>
                                        <th scope="col" class="px-2 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ref ID</th>
                                        <th scope="col" class="px-2 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                        <th scope="col" class="hidden sm:table-cell px-2 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                        <th scope="col" class="px-2 sm:px-4 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-2 sm:px-4 py-2 sm:py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($searchResults as $result)
                                    <tr>
                                        <td class="px-2 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-900">
                                            {{ $result['reference_id'] }}
                                        </td>
                                        <td class="px-2 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($result['appointment_date'])->format('d M Y') }}
                                            <span class="block text-xs">{{ $result['appointment_time'] }}</span>
                                        </td>
                                        <td class="hidden sm:table-cell px-2 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                            Dr. {{ $result['doctor_name'] }}
                                            <span class="block text-xs text-beige-600">{{ $result['department'] }}</span>
                                        </td>
                                        <td class="px-2 sm:px-4 py-2 sm:py-3 whitespace-nowrap">
                                            @if($result['status'] === 'confirmed')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Completed
                                            </span>
                                            @elseif($result['status'] === 'cancelled')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Cancelled
                                            </span>
                                            @elseif($result['status'] === 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-600">
                                                Pending
                                            </span>
                                            @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-beige-100 text-beige-800">
                                                Checked In
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-2 sm:px-4 py-2 sm:py-3 whitespace-nowrap text-right text-xs sm:text-sm font-medium">
                                            <div class="flex justify-end items-center gap-2">
                                                <button
                                                    wire:click="showAppointmentDetails('{{ $result['id'] }}')"
                                                    class="text-beige-600 hover:text-beige-900 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View
                                                </button>
                                                <button
                                                    wire:click="downloadReceipt('{{ $result['id'] }}')"
                                                    class="text-beige-600 hover:text-beige-900 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    Receipt
                                                </button>
                                                @if($result['status'] !== 'cancelled' && $result['status'] !== 'checked_in' && $result['status'] !== 'confirmed')
                                                <button
                                                    wire:click="triggerOtp('{{ $result['id'] }}')"
                                                    class="text-red-600 hover:text-red-900 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Cancel
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Confirmation Modal -->
    <div x-data="{ show: @entangle('showConfirmModal') }" x-show="show" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="show" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div x-show="show" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Cancel Appointment</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to cancel this appointment? This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="cancelAppointment" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Confirm Cancel
                    </button>
                    <button wire:click="closeConfirmModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Keep Appointment
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Details Modal -->
    <div x-data="{ show: @entangle('showDetailsModal') }" x-show="show" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="show" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div x-show="show" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                @if($selectedAppointment)
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 w-full">
                            <!-- Header with Hospital Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900">HealingTouch Hospital</h3>
                                <p class="text-sm text-gray-600">Excellence in Healthcare</p>
                            </div>

                            <!-- Status and Reference -->
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Appointment ID</p>
                                    <p class="text-lg font-bold text-gray-900">{{ $selectedAppointment['appointment_no'] }}</p>
                                </div>
                                <div>
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                        {{ $selectedAppointment['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $selectedAppointment['status'] === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $selectedAppointment['status'] === 'pending' ? 'bg-yellow-100 text-yellow-600' : '' }}">
                                        {{ ucfirst($selectedAppointment['status']) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Payment Information -->
                            <div class="bg-gray-50 rounded-lg p-4 mb-6">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Amount Paid</p>
                                        <p class="text-lg font-bold text-green-600">₹{{ $selectedAppointment['paid_amount'] }}</p>
                                        <span class="text-sm text-gray-600">({{ ucfirst($selectedAppointment['payment_status']) }})</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Queue Number</p>
                                        <p class="text-lg font-bold text-beige-600">#{{ $selectedAppointment['queue_number'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient and Doctor Information -->
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <!-- Patient Information -->
                                <div class="bg-white p-4 rounded-lg border border-gray-200">
                                    <h4 class="text-sm font-medium text-gray-900 mb-3">Patient Information</h4>
                                    <div class="space-y-2">
                                        <div>
                                            <p class="text-xs text-gray-500">Full Name</p>
                                            <p class="text-sm font-medium">{{ $selectedAppointment['patient_name'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Patient ID</p>
                                            <p class="text-sm font-medium">#{{ $selectedAppointment['patient_id'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Gender</p>
                                            <p class="text-sm font-medium">{{ ucfirst($selectedAppointment['patient_gender']) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Contact</p>
                                            <p class="text-sm font-medium">{{ $selectedAppointment['patient_phone'] }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Doctor Information -->
                                <div class="bg-white p-4 rounded-lg border border-gray-200">
                                    <h4 class="text-sm font-medium text-gray-900 mb-3">Doctor Information</h4>
                                    <div class="space-y-2">
                                        <div>
                                            <p class="text-xs text-gray-500">Doctor Name</p>
                                            <p class="text-sm font-medium">Dr. {{ $selectedAppointment['doctor_name'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Department</p>
                                            <p class="text-sm font-medium">{{ $selectedAppointment['department'] }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Consultation Fee</p>
                                            <p class="text-sm font-medium">₹{{ $selectedAppointment['doctor_fee'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Appointment Schedule -->
                            <div class="bg-beige-50 p-4 rounded-lg mb-6">
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Appointment Schedule</h4>
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Date</p>
                                        <p class="text-sm font-medium">{{ \Carbon\Carbon::parse($selectedAppointment['appointment_date'])->format('d M Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Day</p>
                                        <p class="text-sm font-medium text-beige-700">{{ $selectedAppointment['appointment_day'] }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Reporting Time</p>
                                        <p class="text-sm font-medium text-beige-700">{{ \Carbon\Carbon::parse($selectedAppointment['appointment_time'])->format('h:i A') }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                <!-- Details Modal Footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    @if($selectedAppointment)
                    <button
                        wire:click="downloadReceipt('{{ $selectedAppointment['id'] ?? '' }}')"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-beige-600 text-base font-medium text-white hover:bg-beige-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Receipt
                    </button>
                    @endif
                    <button
                        wire:click="closeDetailsModal"
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-beige-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

     <!-- otp modal-->
     <div x-data="{ show: @entangle('showOtpModal') }" x-show="show" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                            <h2 class="text-lg font-bold text-gray-800 mb-4">Enter OTP</h2>
                            <p class="text-sm text-gray-600 mb-4">Please enter the 4-digit OTP sent to your email to confirm cancellation.</p>
                            <input
                                type="text"
                                wire:model="otp"
                                maxlength="4"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm focus:ring focus:ring-beige-500 focus:outline-none"
                                placeholder="Enter OTP">
                            @error('otp') <p class="text-sm text-red-500 mt-2">{{ $message }}</p> @enderror
                            <div class="flex justify-end mt-4">
                                <button
                                    wire:click="verifyOtp"
                                    class="px-4 py-2 bg-beige-600 text-white rounded-md hover:bg-beige-700 transition">
                                    Verify & Cancel
                                </button>
                                <button
                                    wire:click="closeOtpModal"
                                    class="ml-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
</div>