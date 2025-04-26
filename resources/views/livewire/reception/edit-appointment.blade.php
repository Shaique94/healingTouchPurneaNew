<div>
    <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Edit Appointment</h2>

            <form wire:submit.prevent="save" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label>Patient Name</label>
                        <input type="text" wire:model.defer="name" class="w-full border rounded p-2" />
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" wire:model.defer="email" class="w-full border rounded p-2" />
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="text" wire:model.defer="phone" class="w-full border rounded p-2" />
                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Address</label>
                        <input type="text" wire:model.defer="address" class="w-full border rounded p-2" />
                        @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label>Appointment Date</label>
                        <input type="date" wire:model.defer="appointment_date" class="w-full border rounded p-2" />
                        @error('appointment_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Appointment Time</label>
                        <input type="time" wire:model.defer="appointment_time" class="w-full border rounded p-2" />
                        @error('appointment_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Doctor</label>
                        <select wire:model="doctor_id" class="w-full border rounded p-2">
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

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label>Age</label>
                        <input type="number" wire:model.defer="dob" class="w-full border rounded p-2" />
                        @error('dob') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Gender</label>
                        <input type="text" wire:model.defer="gender" class="w-full border rounded p-2" />
                        @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Pin Code</label>
                        <input type="text" wire:model.defer="pincode" class="w-full border rounded p-2" />
                        @error('pincode') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label>City</label>
                        <input type="text" wire:model.defer="city" class="w-full border rounded p-2" />
                        @error('city') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>State</label>
                        <input type="text" wire:model.defer="state" class="w-full border rounded p-2" />
                        @error('state') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label>Country</label>
                        <input type="text" wire:model.defer="country" class="w-full border rounded p-2" />
                        @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label>Notes</label>
                    <textarea wire:model.defer="notes" class="w-full border rounded p-2"></textarea>
                    @error('notes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" wire:click="cancel" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>