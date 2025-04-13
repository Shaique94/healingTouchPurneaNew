<div class="modal fade" id="QualificationModal" tabindex="-1" aria-labelledby="QualificationModalLabel" aria-hidden="true" x-data
            x-on:close-modal.window="() => {
                const modal = bootstrap.Modal.getInstance($el);
                if (modal) modal.hide();
            }"
            wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered modal-lg"> 
    <div class="modal-content shadow-lg border-0 rounded-4"> 

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title" id="QualificationModalLabel">Add Qualification</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="submit">
        <!-- Modal Body -->
        <div class="modal-body px-4 py-3">
          <div class="row">
            <!-- Name Field -->
            <div class="col-12 mb-3">
              <label for="name" class="form-label fw-semibold">Name</label>
              <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter qualification name">
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Description Field -->
            <div class="col-12 mb-3">
              <label for="description" class="form-label fw-semibold">Description</label>
              <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Write a short description..."></textarea>
              @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-1"></i> Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Save
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
