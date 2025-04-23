<div class="bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Select Appointment Time
    </h2>

    <!-- Loading State -->
    <div wire:loading wire:target="selectDateTab" class="py-6 text-center text-gray-500">
        <div class="flex flex-col items-center">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-beige-600 mb-3"></div>
            <p>Loading available time slots...</p>
            <p class="text-sm text-gray-400">This may take a moment</p>
        </div>
    </div>

    <!-- Time Slots -->
    <div wire:loading.remove wire:target="selectDateTab" class="space-y-6">
        <!-- Morning Slots -->
        <div>
            <h3 class="flex items-center text-sm font-semibold text-gray-500 mb-3 pb-1 border-b">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Morning (Before 12 PM)
            </h3>
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                @php $hasmorning = false; @endphp
                @foreach($availableTimes as $time)
                    @php
                        // Check if time is morning slot (before 12 PM)
                        $isPM = strpos($time, 'PM') !== false;
                        $hour = (int) substr($time, 0, strpos($time, ':'));
                        $isNoon = $hour == 11 && $isPM;
                        $isMorning = !$isPM || $isNoon;
                        
                        if ($isMorning) $hasmorning = true;
                    @endphp
                    
                    @if($isMorning)
                        <x-time-slot :time="$time" :appointment-time="$appointmentTime" :time-slot-counts="$timeSlotCounts" />
                    @endif
                @endforeach
                
                @if(!$hasmorning)
                    <div class="col-span-full py-4 px-6 bg-gray-50 rounded-lg text-center">
                        <p class="text-gray-500">No morning slots available</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Afternoon Slots -->
        <div>
            <h3 class="flex items-center text-sm font-semibold text-gray-500 mb-3 pb-1 border-b">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Afternoon (12 PM - 4 PM)
            </h3>
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                @php $hasafternoon = false; @endphp
                @foreach($availableTimes as $time)
                    @php
                        // Check if time is afternoon slot (12 PM - 4 PM)
                        $isPM = strpos($time, 'PM') !== false;
                        $hour = (int) substr($time, 0, strpos($time, ':'));
                        if ($isPM && $hour != 12) $hour += 12;
                        $isAfternoon = $isPM && $hour >= 12 && $hour < 16;
                        
                        if ($isAfternoon) $hasafternoon = true;
                    @endphp
                    
                    @if($isAfternoon)
                        <x-time-slot :time="$time" :appointment-time="$appointmentTime" :time-slot-counts="$timeSlotCounts" />
                    @endif
                @endforeach
                
                @if(!$hasafternoon)
                    <div class="col-span-full py-4 px-6 bg-gray-50 rounded-lg text-center">
                        <p class="text-gray-500">No afternoon slots available</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Evening Slots -->
        <div>
            <h3 class="flex items-center text-sm font-semibold text-gray-500 mb-3 pb-1 border-b">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
                Evening (After 4 PM)
            </h3>
            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-3">
                @php $hasevening = false; @endphp
                @foreach($availableTimes as $time)
                    @php
                        // Check if time is evening slot (after 4 PM)
                        $isPM = strpos($time, 'PM') !== false;
                        $hour = (int) substr($time, 0, strpos($time, ':'));
                        if ($isPM && $hour != 12) $hour += 12;
                        $isEvening = $isPM && $hour >= 16;
                        
                        if ($isEvening) $hasevening = true;
                    @endphp
                    
                    @if($isEvening)
                        <x-time-slot :time="$time" :appointment-time="$appointmentTime" :time-slot-counts="$timeSlotCounts" />
                    @endif
                @endforeach
                
                @if(!$hasevening)
                    <div class="col-span-full py-4 px-6 bg-gray-50 rounded-lg text-center">
                        <p class="text-gray-500">No evening slots available</p>
                    </div>
                @endif
            </div>
        </div>
        
        @if(count($availableTimes) == 0)
            <div class="py-8 text-center">
                <div class="inline-block p-4 rounded-full bg-gray-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-gray-700 font-medium text-lg mb-1">No Time Slots Available</h3>
                <p class="text-gray-500">There are no available appointment slots for the selected date.</p>
                <p class="text-sm text-beige-600 mt-2">Please choose another doctor or contact our reception.</p>
            </div>
        @endif
    </div>
    
    <!-- Slot Legend -->
    <div class="mt-6 flex flex-wrap justify-end gap-4 border-t pt-3">
        <div class="flex items-center">
            <div class="w-4 h-4 bg-green-100 border border-green-200 rounded-full mr-1.5"></div>
            <span class="text-xs text-gray-600">Available (3-4 slots)</span>
        </div>
        <div class="flex items-center">
            <div class="w-4 h-4 bg-yellow-100 border border-yellow-200 rounded-full mr-1.5"></div>
            <span class="text-xs text-gray-600">Filling Up (2 slots)</span>
        </div>
        <div class="flex items-center">
            <div class="w-4 h-4 bg-red-100 border border-red-200 rounded-full mr-1.5"></div>
            <span class="text-xs text-gray-600">Almost Full (1 slot)</span>
        </div>
        <div class="flex items-center">
            <div class="w-4 h-4 bg-gray-100 border border-gray-200 rounded-full mr-1.5"></div>
            <span class="text-xs text-gray-600">Full (0 slots)</span>
        </div>
    </div>
    
    @error('appointmentTime')
        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
