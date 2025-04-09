<div>
    <!-- Add Slot Modal -->
    <div class="modal fade" id="updateSlotModal" tabindex="-1" aria-labelledby="UpdateSlotModalLabel" aria-hidden="true"
        x-data
        x-on:close-modal.window="() => {
            const modal = bootstrap.Modal.getInstance($el);
            if (modal) modal.hide();
        }"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4 border-0">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-semibold" id="addSlotModalLabel">
                        <i class="bi bi-clock me-2"></i> Add New Appointment Slot
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="updateSlot">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="number" wire:model.defer="start_time" class="form-control" id="start_time" placeholder="e.g. 11">
                                @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-6">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="number" wire:model.defer="end_time" class="form-control" id="end_time" placeholder="e.g. 11.30">
                                @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label for="type" class="form-label">Time Type</label>
                                <select wire:model="type" class="form-select" id="type">
                                    <option value="">Select AM/PM</option>
                                    <option value="am">AM</option>
                                    <option value="pm">PM</option>
                                </select>
                                @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label for="number_of_appointments" class="form-label">Number of Appointments</label>
                                <input type="text" wire:model.defer="number_of_appointments" class="form-control" id="number_of_appointments" placeholder="e.g. 5">
                                @error('number_of_appointments') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label for="slotStatus" class="form-label">Status</label>
                                <select class="form-select" id="slotStatus" wire:model.defer="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Available</option>
                                    <option value="0">Unavailable</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light rounded-bottom-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Save Slot
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
