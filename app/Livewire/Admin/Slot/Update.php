<?php

namespace App\Livewire\Admin\Slot;

use App\Models\Slot;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $start_time, $end_time, $status, $number_of_appointments, $type;
    public $isEdit = false, $slot_id, $slot;

    #[On('update-slot')]
    public function edit($id)
    {
        $this->slot = Slot::findOrFail($id);
        $this->start_time = $this->slot->start_time;
        $this->end_time = $this->slot->end_time;
        $this->status = $this->slot->status;
        $this->number_of_appointments = $this->slot->number_of_appointments;
        $this->type = $this->slot->type;
        $this->isEdit = true;
        $this->slot_id = $id;

    }

    public function updateSlot()
    {
        $this->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|boolean',
            'number_of_appointments' => 'required|numeric',
        ]);

        $slot = Slot::findOrFail($this->slot_id);
        $slot->update([
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status' => $this->status,
            'number_of_appointments' => $this->number_of_appointments,
            'type' => $this->type,
        ]);

        $this->reset(['start_time', 'end_time', 'status', 'number_of_appointments', 'type', 'slot_id', 'isEdit']);
        $this->dispatch('close-modal');
        $this->dispatch('refresh-slot');
        $this->dispatch('success', __('Slot Updated successfully'));
    }

    public function render()
    {
        return view('livewire.admin.slot.update');
    }
}
