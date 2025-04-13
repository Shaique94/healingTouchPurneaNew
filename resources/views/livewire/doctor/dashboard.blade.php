<div class="min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-indigo-800 text-white shadow-lg">
        <div class="flex items-center justify-center h-16 bg-indigo-900">
            <h2 class="text-xl font-bold">Healing Touch</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 py-3 bg-indigo-900 text-white rounded mx-3">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </div>
            </div>
            
            <div class="px-4 py-3 bg-indigo-900 text-white rounded mx-3" wire:click="openAvailablityModal">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Update Availablity</span>
                </div>
            </div>
            <div class="px-4 py-3 bg-indigo-900 text-white rounded mx-3" wire:click="logout">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Logout</span>
                </div>
            </div> 

        </nav>
    </div>

    <!-- Main Content Area -->
    <div class="ml-64 p-8">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Doctor Dashboard</h1>
                <p class="text-gray-600">Manage your appointments and patient schedule</p>
            </div>
            <div class="flex flex-col">
                <p class="text-sm text-gray-600 font-medium mb-1">My Availablity Days:</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ($days_available as $day)
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-semibold rounded-full">
                        {{ ucfirst($day) }}
                    </span>
                    @endforeach
                </div>
            </div>


            <div class="flex items-center space-x-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <input type="text" wire:model.live="search" class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Search...">
                </div>

                <div class="flex items-center px-4 py-2 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Doctor profile" class="w-8 h-8 rounded-full mr-2">
                        <span class="text-sm font-medium text-gray-700">{{$doctor_name}}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold text-gray-600">Today's Appointments</h2>
                        <p class="text-2xl font-bold text-gray-900">{{$appointments_count}}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
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
            <div class="bg-white rounded-lg shadow p-6">
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
            <div class="bg-white rounded-lg shadow p-6">
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

        <!-- Filters and Date Selector -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <div class="flex space-x-3 mt-3">
                        <button
                            wire:click="$set('dateFilter', '{{ now()->toDateString() }}')"
                            class="px-4 py-2 rounded-lg shadow text-sm font-medium transition duration-200
            {{ $dateFilter === now()->toDateString() ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                            Today
                        </button>

                        <button
                            wire:click="$set('dateFilter', '{{ now()->addDay()->toDateString() }}')"
                            class="px-4 py-2 rounded-lg shadow text-sm font-medium transition duration-200
            {{ $dateFilter === now()->addDay()->toDateString() ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                            Tomorrow
                        </button>
                    </div>
                  
                </div>

            </div>
        </div>

        <!-- Appointments Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden" x-data="{ appointments: [] }" wire:init="">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg font-medium text-gray-900">Today's Appointments</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Patient
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Purpose
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr> 
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Example rows, wire:key would be used in a real implementation -->
                        @foreach ($appointments as $appointment)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $appointment->patient->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $appointment->appointment_time }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $appointment->notes }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                $statusColors = [
                                'confirmed' => 'bg-green-100 text-green-800',
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                                ];
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$appointment->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $appointment->status }}
                                </span>
                            </td> 
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2 h-full">
                                    @if ($appointment->status === 'checked_in')
                                    <button wire:click="markAsCompleted({{ $appointment->id }})" wire:confirm="Are you sure you want to mark this appointment as completed?" class="text-green-600 hover:text-green-900">Mark as completed</button>
                                    @else
                                    <button disabled class="text-gray-400 cursor-not-allowed">Mark as completed</button>
                                    @endif
                                    <a href="" class="text-indigo-600 hover:text-indigo-900">View</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                        <!-- More appointments... -->
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
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
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Update Availability</h2>

            <form wire:submit.prevent="saveAvailability">
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($days as $day)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" wire:model.defer="availabilityDays.{{ $day }}" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="text-sm">{{ ucfirst($day) }}</span>
                    </label>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" wire:click="closeSettingsModal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>