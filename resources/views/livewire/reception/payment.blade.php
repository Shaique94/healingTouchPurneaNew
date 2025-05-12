<div>
    @if ($ToggleModal)
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-40 z-40"></div>

    <!-- Modal Container -->
    <div class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 sm:px-6">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl transition transform duration-300">

            <!-- Modal Header -->
            <div class="flex justify-between items-center px-5 py-3 bg-beige-600 text-white rounded-t-2xl">
                <h3 class="text-sm font-semibold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                        <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                    </svg>
                    Payment Details
                </h3>
                <button wire:click="closeModal" class="text-white text-lg font-bold hover:opacity-75">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="px-5 py-4 space-y-4 text-sm text-gray-700">
                <form wire:submit.prevent="save" class="space-y-4">

                    <!-- Total Amount -->
                    <div>
                        <label class="block mb-1 font-medium">Total Amount</label>
                        <input type="text" wire:model.live="total_amount" readonly
                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" />
                        @error('total_amount') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <!-- Payment Mode -->
                    <div>
                        <label class="block mb-1 font-medium">Payment Mode</label>
                        <select wire:model.live="mode"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="">Select payment option</option>
                            <option value="cash">Cash</option>
                            <option value="upi">UPI</option>
                            <option value="card">Card</option>
                        </select>
                        @error('mode') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <!-- Paid Amount -->
                    <div>
                        <label class="block mb-1 font-medium">Paid Amount</label>
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <span class="bg-gray-100 px-3 py-2 text-gray-600">₹</span>
                            <input type="number" wire:model.live="paid_amount"
                                class="w-full px-3 py-2 focus:outline-none" />
                        </div>
                        @error('paid_amount') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <!-- Settlement -->
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="settlementCheck" wire:model.live="settlement"
                            class="text-beige-600 border-gray-300 rounded focus:ring-beige-500" {{ $settlement ? 'checked' : '' }} />
                        <label for="settlementCheck">Mark as Settled</label>
                    </div>
                    @if (session()->has('warning'))
                    <p class="text-yellow-600 text-sm">{{ session('warning') }}</p>
                    @endif

                    <!-- Status -->
                    <div>
                        <label class="block mb-1 font-medium">Status</label>
                        <select wire:model.live="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="">Select status</option>
                            <option value="due">Due</option>
                            <option value="paid">Paid</option>
                        </select>
                        @error('status') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                        @if (session()->has('due'))
                        <p class="text-yellow-600 text-sm">{{ session('due') }}</p>
                        @endif
                        @if (session()->has('whensettle'))
                        <p class="text-yellow-600 text-sm">{{ session('whensettle') }}</p>
                        @endif
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-3 pt-2">
                        <button type="button" wire:click="closeModal"
                            class="px-4 py-1.5 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Cancel</button>
                        <button type="submit"
                            class="px-4 py-1.5 bg-beige-600 hover:bg-beige-700 text-white rounded-md">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    @endif
</div>