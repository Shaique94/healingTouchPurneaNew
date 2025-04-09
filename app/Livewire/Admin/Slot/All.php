<?php

namespace App\Livewire\Admin\Slot;

use App\Models\Slot;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public function toggleStatus($id)
    {
        $slot = Slot::find($id);

        if ($slot) {
            $slot->status = !$slot->status;
            $slot->save();

            $this->dispatch('success', __('Slot status updated successfully!'));
        }
    }

    public function deleteSlot($id)
    {
        $slot = Slot::find($id);

        if ($slot) {
            $slot->delete();

            $this->dispatch('success', __('Slot deleted successfully!'));

            // Optionally trigger a refresh for any listening components
            $this->dispatch('refresh-slot');
        }
    }

    #[On('refresh-slot')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.slot.all', [
            'slots' => Slot::orderBy('start_time')->get()
        ]);
    }
}
