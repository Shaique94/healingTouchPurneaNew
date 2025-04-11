<div class="min-h-screen bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4 hidden md:block">
        <h2 class="text-xl font-bold mb-6">Reception</h2>
        <nav class="space-y-3">
            <a href="#" class="block px-4 py-2 rounded bg-blue-100 text-blue-700 font-semibold">Dashboard</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Patients</a>
            <a href="#" class="block px-4 py-2 rounded text-red-600 hover:bg-red-100">Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Welcome, {{ Auth::user()->name }} </h1>
                <p class="text-sm text-gray-600">Reception Dashboard</p>
            </div>
            <div class="text-sm text-gray-500">{{ now()->format('l, d M Y') }}</div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Appointments Today</p>
                <p class="text-2xl font-bold text-blue-600">{{$appointments_count}}</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Checked-In</p>
                <p class="text-2xl font-bold text-green-600">{{$appointments_checked_in}}</p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Cancelled</p>
                <p class="text-2xl font-bold text-red-500">{{$appointments_cancelled}}</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
            <!-- Search Bar -->
            <div class="sm:col-span-2">
                <input type="text"
                    wire:model.live="search"
                    placeholder="Search patients or appointments..."
                    class="w-full px-4 py-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
            </div>

            <!-- New Patient Button -->
            <div>
                <button class="w-32 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow">
                    New Patient
                </button>
            </div>
        </div>

        <!-- Today’s Appointments -->
        <div class="bg-white p-6 rounded-xl shadow overflow-auto">
            <!-- Filter Buttons -->
            <div class="flex justify-end mb-4 space-x-2">
                <button wire:click="filterByDate('today')"
                    class="px-4 py-2 text-sm rounded-lg font-semibold 
                       {{ $selectedDate === 'today' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                    Today
                </button>
                <button wire:click="filterByDate('tomorrow')"
                    class="px-4 py-2 text-sm rounded-lg font-semibold 
                       {{ $selectedDate === 'tomorrow' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                    Tomorrow
                </button>
            </div>
            <h2 class="text-lg font-bold mb-4">Today’s Appointments</h2>

            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-500 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Patient Name</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">City</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($appointments as $appointment)
                    <tr>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $appointment->patient->name }}</td>
                        <td class="px-4 py-3">{{ $appointment->patient->phone }}</td>
                        <td class="px-4 py-3">{{ $appointment->patient->address }}</td>
                        <td class="px-4 py-3">{{ $appointment->patient->city }}</td>

                        <td class="px-4 py-3">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                            @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($appointment->status === 'checked-in') bg-green-100 text-green-800
                            @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800
                            @endif">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            @if($appointment->status === 'pending')
                            <button wire:click.prevent="checkIn({{ $appointment->id }})"
                                wire:confirm="Are you sure you want to check in this post?"
                                class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded-full">
                                Check-In
                            </button>
                            <button wire:click.prevent="cancelAppointment({{ $appointment->id }})"
                                wire:confirm="Are you sure you want to cancel the appointment?"
                                class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-full">
                                Cancel
                            </button>
                            @else
                            <span class="text-xs text-gray-400">Patient Visited</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
</div>