<div>
<div class="fixed inset-0 bg-neutral-800 bg-opacity-80 flex items-center justify-center z-50 p-3">
    <div class="bg-neutral-50 rounded-lg p-4 w-full max-w-4xl shadow-lg border border-beige-100 mx-auto overflow-y-auto max-h-screen">
        <h2 class="text-lg font-semibold mb-3  text-beige-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-beige-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Edit Appointment
        </h2>

        <form wire:submit.prevent="save" class="space-y-3">
            <!-- Patient Details (including contact) -->
            <div>
                <h3 class="text-sm font-semibold text-beige-700 mb-2 border-b border-beige-100 pb-1">Patient Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mb-2">
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Patient Name</label>
                        <input type="text" wire:model.defer="name" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Email</label>
                        <input type="email" wire:model.defer="email" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Phone</label>
                        <input type="text" wire:model.defer="phone" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Age</label>
                        <input type="number" wire:model.defer="dob" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('dob') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Gender</label>
                        <input type="text" wire:model.defer="gender" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                 
                </div>
            </div>

            <!-- Address Details -->
            <div>
                <h3 class="text-sm font-semibold text-beige-700 mb-2 border-b border-beige-100 pb-1">Address Details</h3>
                <div class="grid grid-cols-1 gap-2 mb-2">
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Address</label>
                        <input type="text" wire:model.defer="address" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Pin Code</label>
                        <input type="text" wire:model.defer="pincode" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('pincode') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">City</label>
                        <input type="text" wire:model.defer="city" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">State</label>
                        <input type="text" wire:model.defer="state" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Country</label>
                        <input type="text" wire:model.defer="country" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Appointment Details -->
            <div>
                <h3 class="text-sm font-semibold text-beige-700 mb-2 border-b border-beige-100 pb-1">Appointment Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mb-2">
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Appointment Date</label>
                        <input type="date" wire:model.defer="appointment_date" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('appointment_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Appointment Time</label>
                        <input type="time" wire:model.defer="appointment_time" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none" />
                        @error('appointment_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-beige-700 mb-1">Doctor</label>
                        <select wire:model="doctor_id" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none appearance-none bg-white">
                            <option value="">Select Doctor</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">
                                {{ $doctor->user->name ?? 'Unnamed Doctor' }}
                            </option>
                            @endforeach
                        </select>
                        @error('doctor_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-beige-700 mb-1">Notes</label>
                    <textarea wire:model.defer="notes" class="w-full border border-beige-200 rounded-md p-2 focus:ring-1 focus:ring-beige-400 focus:border-beige-400 outline-none h-16"></textarea>
                    @error('notes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3 mt-3">
                <button type="button" wire:click="cancel" class="px-4 py-1.5 bg-neutral-200 text-neutral-700 rounded-md hover:bg-neutral-300 transition">Cancel</button>
                <button type="submit" class="px-4 py-1.5 bg-beige-600 text-white rounded-md hover:bg-beige-700 transition">Save</button>
            </div>
        </form>
    </div>
</div>
</div>
