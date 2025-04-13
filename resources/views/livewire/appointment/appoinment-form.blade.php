<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Create Patient</h2>

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
            <label>Name</label>
            <input type="text" wire:model="name" class="w-full border rounded p-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" wire:model="email" class="w-full border rounded p-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Phone</label>
            <input type="text" wire:model="phone" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Date of Birth</label>
            <input type="date" wire:model="dob" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Gender</label>
            <select wire:model="gender" class="w-full border rounded p-2">
                <option value="">-- Select Gender --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label>Address</label>
            <input type="text" wire:model="address" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Pincode</label>
            <input type="text" wire:model="pincode" class="w-full border rounded p-2">
        </div>

        <div>
            <label>City</label>
            <input type="text" wire:model="city" class="w-full border rounded p-2">
        </div>

        <div>
            <label>State</label>
            <input type="text" wire:model="state" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Country</label>
            <input type="text" wire:model="country" class="w-full border rounded p-2">
        </div>

        <div class="col-span-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Save and next
            </button>
        </div> 
    </form>
</div>
