<div class="min-h-screen bg-gray-50">
    <!-- Sidebar - Changes to top navigation on mobile -->
    <div class="fixed inset-y-0 left-0 w-64 bg-beige-600 text-white shadow-lg transform transition-transform duration-300 lg:translate-x-0 -translate-x-full z-30 " id="sidebar">
        <div class="flex items-center justify-between h-16 bg-beige-700 px-4">
            <h2 class="text-xl font-bold">Healing Touch</h2>
            <button class="lg:hidden text-white focus:outline-none" onclick="document.getElementById('sidebar').classList.add('-translate-x-full')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="mt-6 space-y-2">
            <div class="px-4 py-3 bg-beige-700 text-white rounded mx-3 hover:bg-beige-800 transition-colors duration-200 cursor-pointer group">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="group-hover:translate-x-1 transition-transform">Dashboard</span>
                </div>
            </div>
            
            <div class="px-4 py-3 bg-beige-700 text-white rounded mx-3 hover:bg-beige-800 transition-colors duration-200 cursor-pointer group" wire:click="openAvailablityModal">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="group-hover:translate-x-1 transition-transform">Update Availability</span>
                </div>
            </div>

            <div class="px-4 py-3 bg-beige-700 text-white rounded mx-3 hover:bg-beige-800 transition-colors duration-200 cursor-pointer group" wire:click="logout">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Header -->
    <div class="lg:hidden fixed top-0 inset-x-0 bg-beige-600 text-white z-20 shadow-md">
        <div class="flex items-center justify-between h-16 px-4">
            <div class="flex items-center">
                <button class="text-white focus:outline-none mr-3" onclick="document.getElementById('sidebar').classList.remove('-translate-x-full')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="text-xl font-bold">Healing Touch</h2>
            </div>
            <div class="flex items-center">
                <img src="{{asset('storage/' . $doctor_image)}}" alt="Doctor profile" class="w-8 h-8 rounded-full">
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="lg:ml-64 p-4 md:p-8 pt-20 lg:pt-8 space-y-6">
        <!-- Header Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Doctor Dashboard</h1>
                <p class="text-gray-600">Welcome back, Dr. {{$doctor_name}}</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h2 class="text-sm font-semibold text-gray-700 mb-3">Available Days</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach ($days_available as $day)
                    <span class="px-3 py-1.5 bg-beige-50 text-beige-700 text-xs font-medium rounded-full border border-beige-200">
                        {{ ucfirst($day) }}
                    </span>
                    @endforeach
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{asset('storage/' . $doctor_image)}}" alt="Doctor profile" class="w-10 h-10 rounded-full border-2 border-beige-200">
                        <div>
                            <h3 class="font-medium text-gray-900">{{$doctor_name}}</h3>
                            <p class="text-sm text-gray-500">General Physician</p>
                        </div>
                    </div>
                    <button wire:click="openAvailablityModal" class="px-4 py-2 bg-beige-100 text-beige-700 rounded-lg text-sm font-medium hover:bg-beige-200 transition-colors">
                        Update Schedule
                    </button>
                </div>
                <div class="relative">
                    <input type="text" wire:model.live="search" class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-beige-600" placeholder="Search patients...">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            <div class="bg-gradient-to-br from-beige-50 to-white p-6 rounded-xl shadow-sm border border-beige-200 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <p class="text-sm font-medium text-beige-600">Total Appointments</p>
                        <h3 class="text-2xl font-bold text-beige-900">{{$appointments_count}}</h3>
                    </div>
                    <div class="p-3 bg-beige-100 rounded-lg group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-600">Completed</h2>
                        <p class="text-2xl font-bold text-gray-900">{{$appointments_completed}}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-600">Upcoming</h2>
                        <p class="text-2xl font-bold text-gray-900">{{$appointments_upcoming}}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 md:p-6 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-600">Cancelled</h2>
                        <p class="text-2xl font-bold text-gray-900">{{$appointments_cancelled}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Filter -->
        <div class="bg-white p-4 md:p-6 rounded-xl shadow-sm border border-gray-200">
            <div class="flex flex-wrap gap-3">
                <button
                    wire:click="$set('dateFilter', '{{ now()->toDateString() }}')"
                    class="flex-1 sm:flex-none px-6 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105
                    {{ $dateFilter === now()->toDateString() 
                        ? 'bg-beige-600 text-white shadow-lg shadow-beige-200/50' 
                        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Today's Schedule
                </button>
                <button
                    wire:click="$set('dateFilter', '{{ now()->addDay()->toDateString() }}')"
                    class="flex-1 sm:flex-none px-6 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105
                    {{ $dateFilter === now()->addDay()->toDateString() 
                        ? 'bg-beige-600 text-white shadow-lg shadow-beige-200/50' 
                        : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Tomorrow's Schedule
                </button>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-4 md:px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900">Today's Appointments</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Patient
                            </th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Time
                            </th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Purpose
                            </th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-4 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr> 
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Example rows, wire:key would be used in a real implementation -->
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0 md:ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $appointment->appointment_time }}</div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                                <div class="text-sm text-gray-900">{{ $appointment->notes }}</div>
                            </td>
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                @php
                                $statusColors = [
                                    'checked_in' => 'bg-blue-100 text-blue-800',
                                    'confirmed' => 'bg-green-100 text-green-800',
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                ];
                                $statusDisplay = [
                                    'checked_in' => 'Checked In',
                                    'confirmed' => 'Completed',
                                    'pending' => 'Pending',
                                    'cancelled' => 'Cancelled',
                                ];
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $statusDisplay[$appointment->status] ?? $appointment->status }}
                                </span>
                            </td> 
                            <td class="px-4 md:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2 h-full">
                                    @if ($appointment->status === 'checked_in')
                                    <button wire:click="markAsCompleted({{ $appointment->id }})" wire:confirm="Are you sure you want to mark this appointment as completed?" class="text-green-600 hover:text-green-900 text-xs md:text-sm">Complete</button>
                                    @else
                                    <button disabled class="text-gray-400 cursor-not-allowed text-xs md:text-sm">Complete</button>
                                    @endif
                                    <a wire:navigate href="{{ route('doctor.view-patient', ['appointment_id' => $appointment->id]) }}" class="text-beige-600 hover:text-beige-900 text-xs md:text-sm">View</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More appointments... -->
                    </tbody>
                </table>
            </div>
            <div class="px-4 md:px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div class="flex justify-between items-center">
                        <div class="inline-flex -space-x-px">
                            <button class="px-3 py-1 rounded-l border border-gray-300 bg-white text-sm text-gray-700 hover:bg-gray-100">
                                Previous
                            </button>
                            <button class="px-3 py-1 rounded-r border border-gray-300 bg-white text-sm text-gray-700 hover:bg-gray-100">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Availability Modal -->
    @if ($showSettingsModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-4 md:p-6 border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Update Availability</h2>

            <form wire:submit.prevent="saveAvailability">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($days as $day)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" wire:model.defer="availabilityDays.{{ strtolower($day) }}" class="form-checkbox h-5 w-5 text-beige-600">
                        <span class="text-sm">{{ ucfirst($day) }}</span>
                    </label>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" wire:click="closeSettingsModal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-beige-400 text-white rounded hover:bg-beige-700">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>