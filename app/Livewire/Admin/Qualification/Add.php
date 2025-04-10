<?php

namespace App\Livewire\Admin\Qualification;

use App\Models\Qualification;
use Livewire\Component;

class Add extends Component
{
    public $name, $description;

    public function submit()
    {
       $data= $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Qualification::create($data);
        $this->reset(['name', 'description']);
        $this->dispatch('refresh-qualification');
        $this->dispatch('success', __('Qualification Added successfully'));
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.qualification.add');
    }
}
