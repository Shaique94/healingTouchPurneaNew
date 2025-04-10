<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $id;
    public $name;
    public $description;
    public $status;

    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'status'       => 'required|boolean',
            'description'  => 'nullable|string',
        ];
    }

   

    public function resetData()
    {
        $this->reset(['name', 'description', 'status']);
    }

    #[On('update-department')]
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $this->id          = $id;
        $this->name       = $department->name;
        $this->description = $department->description;
        $this->status      = $department->status;
    }

    public function update()
    {
        $this->validate();
        
        Department::findOrFail($this->id)->update([
            'name'       => $this->name,
            'status'      => $this->status,
            'description' => $this->description,
        ]);

        $this->resetData();
        $this->dispatch('close-modal');
        $this->dispatch('refresh-department');
        $this->dispatch('success', __('Department  Updated successfully.'));
       
    }
    public function render()
    {
        return view('livewire.admin.department.update');
    }
}
