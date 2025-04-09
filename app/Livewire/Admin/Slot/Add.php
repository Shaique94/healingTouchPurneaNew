<?php
namespace App\Livewire\Admin\Slot;

use App\Models\Slot;
use Livewire\Component;

class Add extends Component
{
    public $start_time, $end_time, $status, $number_of_appointments,$type;
    public $isEdit = false, $slot_id;

    protected $rules = [
        'start_time' => 'required',
        'end_time' => 'required',
        'status' => 'required|in:0,1',
        'type' => 'required|in:am,pm',
        'number_of_appointments' => 'required|integer|min:1',
    ];

    public function resetForm()
    {
        $this->reset(['start_time', 'end_time', 'status', 'number_of_appointments', 'isEdit', 'slot_id']);
    }

    public function saveSlot()
    {
        $this->validate();

        Slot::create([
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'type' => $this->type,
            'status' => $this->status,
            'number_of_appointments' => $this->number_of_appointments,
        ]);

        $this->dispatch('close-modal');
        $this->dispatch('refresh-slot');
        $this->dispatch('success', __('Slot created successfully'));
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.admin.slot.add');
    }
}
