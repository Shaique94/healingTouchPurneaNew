<div>
    <div>
        @if ($ToggleModal)
        <div class="modal d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header bg-primary py-2">
                        <h5 class="modal-title text-white fs-6 fw-semibold">
                            <i class="bi bi-cash-coin me-2"></i> Payment Details
                        </h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="mb-2">
                                <label class="form-label">Total Amount</label>
                                <input type="text" wire:model.live="total_amount" class="form-control form-control-sm" readonly>
                                @error('total_amount') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Payment Mode</label>
                                <select wire:model.live="mode" class="form-control form-control-sm">
                                    <option value="">select payment option</option>
                                    <option value="cash">Cash</option>
                                    <option value="upi">Upi</option>
                                    <option value="card">Card</option>
                                </select>
                                @error('mode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Paid Amount</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text"><i class="bi bi-currency-rupee"></i></span>
                                    <input type="number" wire:model.live="paid_amount" class="form-control">
                                </div>
                                @error('paid_amount') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" wire:model.live="settlement" class="form-check-input" id="settlementCheck" {{ $settlement ? 'checked' : '' }}>
                                <label class="form-check-label small" for="settlementCheck">Mark as Settled</label>
                                @if (session()->has('warning'))
                                <div class="">
                                    <span class="text-warning">{{ session('warning') }}</span>
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select wire:model.live="status" class="form-select form-select-sm">
                                    <option value="">Select Status</option>
                                    <option value="due">Due</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary btn-sm" wire:click="closeModal">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>