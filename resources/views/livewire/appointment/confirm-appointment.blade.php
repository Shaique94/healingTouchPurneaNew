<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Book Appointment for {{ $patient->name }}</h2>

    @if (session()->has('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-5">

        <!-- Doctor -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Doctor</label>
            <select wire:model="doctor_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Select Doctor --</option>
                @foreach($doctors as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->user->name }} ({{ $doc->department->name ?? 'N/A' }})</option>
                @endforeach
            </select>
            @error('doctor_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Date -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" wire:model="appointment_date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('appointment_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Time -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Time</label>
            <input type="time" wire:model="appointment_time" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('appointment_time') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Payment Method -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
            <select wire:model="payment_method" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="cash">Cash</option>
                <option value="card">Card</option>
            </select>
            @error('payment_method') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Notes -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea wire:model="notes" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                Book Appointment
            </button>
        </div>
    </form>
</div>
