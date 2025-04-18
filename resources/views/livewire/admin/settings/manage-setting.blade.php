<div class="container my-5">
    <h2 class="mb-4">General Settings</h2>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <!-- Hospital Name -->
        <div class="mb-3">
            <label for="hospital_name" class="form-label">Hospital Name</label>
            <input wire:model="hospital_name" type="text" class="form-control" id="hospital_name" placeholder="Enter hospital name">
            @error('hospital_name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label for="logo" class="form-label">Hospital Logo</label>
            @if ($current_logo)
                <div class="mb-2">
                    <img src="{{ $current_logo }}" alt="Current Logo" class="img-fluid" style="max-width: 150px;">
                </div>
            @endif
            <input wire:model="logo" type="file" class="form-control" id="logo">
            @error('logo')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Email -->
        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact Email</label>
            <input wire:model="contact_email" type="email" class="form-control" id="contact_email" placeholder="Enter email">
            @error('contact_email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contact Phone -->
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Contact Phone</label>
            <input wire:model="contact_phone" type="text" class="form-control" id="contact_phone" placeholder="Enter phone number">
            @error('contact_phone')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea wire:model="address" class="form-control" id="address" rows="4" placeholder="Enter address"></textarea>
            @error('address')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>