<div>
<div class="container-fluid py-4 px-4 bg-light min-vh-100">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center bg-white p-4 rounded-3 shadow-sm mb-4">
        <div>
            <h4 class="mb-1">Hospital Settings</h4>
            <p class="text-muted mb-0">Manage your hospital information and configuration</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <!-- Basic Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-building me-2 text-primary"></i>Basic Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Hospital Name -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Hospital Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-hospital"></i></span>
                                    <input wire:model="hospital_name" type="text" class="form-control" placeholder="Enter hospital name">
                                </div>
                                @error('hospital_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Logo Upload -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Hospital Logo</label>
                                <div class="d-flex align-items-center gap-3">
                                    @if ($current_logo)
                                        <img src="{{ $current_logo }}" class="rounded shadow-sm" style="width: 100px; height: 100px; object-fit: contain;">
                                    @endif
                                    <div class="flex-grow-1">
                                        <input wire:model="logo" type="file" class="form-control">
                                        <small class="text-muted">Recommended size: 200x200px</small>
                                        @error('logo') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- SMS Status -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">SMS Notifications</label>
                                <div class="form-check form-switch">
                                    <input wire:model="sms_status" class="form-check-input" type="checkbox" role="switch" id="smsStatus" {{ $sms_status ? 'checked' : '' }}>
                                    <label class="form-check-label" for="smsStatus">
                                        {{ $sms_status ? 'Enabled' : 'Disabled' }}
                                    </label>
                                </div>
                                <small class="text-muted">Enable or disable SMS notifications for the hospital</small>
                                @error('sms_status') <small class="text-danger d-block">{{ $message }}</small> @enderror
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-envelope me-2 text-primary"></i>Contact Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input wire:model="contact_email" type="email" class="form-control" placeholder="Enter email">
                                </div>
                                @error('contact_email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                    <input wire:model="contact_phone" type="text" class="form-control" placeholder="Enter phone">
                                </div>
                                @error('contact_phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-geo-alt"></i></span>
                                    <textarea wire:model="address" class="form-control" rows="3" placeholder="Enter complete address"></textarea>
                                </div>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-share me-2 text-primary"></i>Social Media Links
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="instagram" class="form-label">Instagram Link</label>
                                <input wire:model="instagram_link" type="url" class="form-control" id="instagram" placeholder="Enter Instagram link">
                                @error('instagram_link') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Facebook Link -->
                            <div class="col-md-12">
                                <label for="facebook" class="form-label">Facebook Link</label>
                                <input wire:model="facebook_link" type="url" class="form-control" id="facebook" placeholder="Enter Facebook link">
                                @error('facebook_link') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- Twitter Link -->
                            <div class="col-md-12">
                                <label for="twitter" class="form-label">Twitter Link</label>
                                <input wire:model="twitter_link" type="url" class="form-control" id="twitter" placeholder="Enter Twitter link">
                                @error('twitter_link') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Card -->
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-eye me-2 text-primary"></i>Preview
                    </h5>
                </div>
                <div class="card-body text-center p-4">
                    @if ($current_logo)
                        <img src="{{ $current_logo }}" class="mb-3 rounded shadow-sm" style="max-width: 150px;">
                    @endif
                    <h5 class="mb-2 text-break">{{ $hospital_name ?: 'Hospital Name' }}</h5>
                    <p class="text-muted mb-3 text-break">{{ $address ?: 'Hospital Address' }}</p>
                    <hr>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <div class="text-break"><i class="bi bi-envelope me-2"></i>{{ $contact_email ?: 'Email' }}</div>
                        <div class="text-break"><i class="bi bi-telephone me-2"></i>{{ $contact_phone ?: 'Phone' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .input-group-text {
        border: none;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
    }
    /* Add these new styles */
    .text-break {
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
    }
    @media (max-width: 575.98px) {
        .d-flex.flex-column.flex-sm-row {
            gap: 0.5rem !important;
        }
    }
</style>
</div>