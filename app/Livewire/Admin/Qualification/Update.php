<?php

namespace App\Livewire\Admin\Qualification;

use App\Models\Qualification;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $name, $description;
    public $qualification_id;

    #[On('update-qual')]
    public function edit($id)
    {
        $qualification = Qualification::findOrFail($id);
        $this->name       = $qualification->name;
        $this->description = $qualification->description;
        $this->qualification_id = $qualification->id;
    }
    public function submit(){
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Qualification::findOrFail($this->qualification_id)->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        $this->dispatch('refresh-qualification');
        $this->dispatch('success', __('Qualification Updated successfully'));
        $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.admin.qualification.update');
    }
}
