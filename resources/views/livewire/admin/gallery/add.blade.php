<div>
    <div class="modal fade {{ $showModal ? 'show' : '' }}"
        tabindex="-1"
        role="dialog"
        style="{{ $showModal ? 'display: block' : 'display: none' }}">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
            <div class="modal-content shadow-lg border-0">
                <form wire:submit.prevent="saveGalleryImage">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="bi bi-images me-2"></i>{{ $gallery_id ? 'Edit' : 'Add' }} Gallery Image
                        </h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body bg-light">
                        <div class="card p-4 border-0 shadow-sm">
                            <div class="row g-3">

                                {{-- Image Upload --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="image">
                                        <i class="bi bi-file-image me-1"></i>Select Image
                                    </label>
                                    <input type="file" wire:model="image" id="image" class="form-control" accept="image/*">
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror

                                    <div wire:loading wire:target="image" class="mt-2">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Uploading...</span>
                                        </div>
                                        <span class="ms-2">Uploading...</span>
                                    </div>

                                    @if ($image)
                                    <div class="mt-3">
                                        <p class="fw-bold">Preview:</p>
                                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded border" style="max-height: 200px;">
                                    </div>
                                    @endif
                                </div>

                                {{-- Alt Text --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="alt">
                                        <i class="bi bi-card-text me-1"></i>Alt Text
                                    </label>
                                    <input type="text" wire:model="alt" id="alt" class="form-control" placeholder="Enter alt text">
                                    @error('alt') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Category --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold" for="category">
                                        <i class="bi bi-tags me-1"></i>Category
                                    </label>
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
                                    @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Modal Footer --}}
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">
                            <i class="bi bi-x-circle"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save2-fill"></i> Save Image
                        </button>
                    </div>
                </form>
            </div>
        </div>
      
    </div>

    @if($showModal)
    <div class="modal-backdrop fade show"></div>
    @endif
</div>