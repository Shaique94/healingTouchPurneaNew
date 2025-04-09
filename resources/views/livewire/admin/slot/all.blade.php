<div>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-center flex-grow-1">Appointment Slots</h2>
            <button class="btn btn-primary shadow-sm rounded-pill ms-3" data-bs-toggle="modal" data-bs-target="#addSlotModal">
                <i class="bi bi-plus-circle me-1"></i> Add Slot
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.Id</th>
                        <th>Slot Time</th>
                        <th>Status</th>
                        <th>Number of Appointment</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($slots as $key=>$slot )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $slot->start_time}} - {{ $slot->end_time }} {{ $slot->type }}</td>
                        <td>
                            <div class="form-check form-switch d-flex justify-content-center">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    role="switch"
                                    id="switch-{{ $slot->id }}"
                                    wire:change="toggleStatus({{ $slot->id }})"
                                    {{ $slot->status ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>{{ $slot->number_of_appointments }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateSlotModal"
                                    wire:click="$dispatch('update-slot', { id: {{ $slot->id }} })">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <button class="btn btn-sm btn-outline-danger"
                                    wire:click="deleteSlot({{ $slot->id }})"
                                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
    <livewire:admin.slot.add />
    <livewire:admin.slot.update />

</div>