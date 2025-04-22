@props(['time', 'appointmentTime', 'timeSlotCounts'])

@php
    $bookingCount = isset($timeSlotCounts[$time]) ? $timeSlotCounts[$time] : 0;
    $slotsRemaining = 4 - $bookingCount;
    
    // Determine status color based on available slots
    $statusColor = 'bg-green-100 border-green-200 text-green-800'; // Default: plenty available
    if($slotsRemaining <= 1) {
        $statusColor = 'bg-red-100 border-red-200 text-red-800'; // Almost full
    } elseif($slotsRemaining <= 2) {
        $statusColor = 'bg-yellow-100 border-yellow-200 text-yellow-800'; // Getting full
    }
    
    // If slot is full, use gray and disable
    $isDisabled = $slotsRemaining <= 0;
    if($isDisabled) {
        $statusColor = 'bg-gray-100 border-gray-200 text-gray-400 cursor-not-allowed opacity-70';
    }
@endphp

<button type="button"
    wire:click="$set('appointmentTime', '{{ $time }}')"
    {{ $isDisabled ? 'disabled' : '' }}
    class="relative py-2 px-2 text-sm font-medium rounded-md border transition-colors
    {{ $appointmentTime === $time ? 'bg-beige-600 text-white border-beige-600' : $statusColor }}">
    {{ $time }}
    
</button>
