<div>
    <div class="modal fade {{ $showModal ? 'show' : '' }}"
        tabindex="-1"
        role="dialog"
        style="{{ $showModal ? 'display: block' : 'display: none' }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="updateGallery">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-images me-2"></i>Update Gallery Image
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Current Image -->
                        <div class="text-center mb-3">
                            <img src="{{ $currentImage ? asset('storage/gallery/' . $currentImage) : '' }}"
                                class="img-thumbnail" style="max-height: 200px;">
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">New Image (optional)</label>
                            <input type="file" wire:model="image" class="form-control" accept="image/*">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Alt Text -->
                        <div class="mb-3">
                            <label class="form-label">Alt Text</label>
                            <input type="text" wire:model="alt" class="form-control">
                            @error('alt') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Category -->
                        <select wire:model="category" id="category" class="form-select">
                            <option value="">-- Select Category --</option>
                            <option value="All">All</option>
                            <option value="Operation Theaters">Operation Theaters</option>
                            <option value="ICU & Emergency">ICU & Emergency</option>
                            <option value="Patient Rooms">Patient Rooms</option>
                            <option value="Reception Area">Reception Area</option>
                            <option value="Waiting Area">Waiting Area</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Diagnostic Lab">Diagnostic Lab</option>
                            <option value="Radiology & Imaging">Radiology & Imaging</option>
                            <option value="OPD Rooms">OPD Rooms</option>
                            <option value="Surgery Rooms">Surgery Rooms</option>
                            <option value="Consultation Rooms">Consultation Rooms</option>
                            <option value="Medical Equipment">Medical Equipment</option>
                            <option value="Staff Activities">Staff Activities</option>
                            <option value="Training Sessions">Training Sessions</option>
                            <option value="Events & Workshops">Events & Workshops</option>
                            <option value="Celebrations">Celebrations</option>
                            <option value="Canteen / Cafeteria">Canteen / Cafeteria</option>
                            <option value="Ambulance Services">Ambulance Services</option>
                            <option value="Hospital Exterior">Hospital Exterior</option>
                            <option value="Hospital Interior">Hospital Interior</option>
                            <option value="Parking Area">Parking Area</option>
                            <option value="CSR Activities">CSR Activities</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($showModal)
    <div class="modal-backdrop fade show"></div>
    @endif
</div>