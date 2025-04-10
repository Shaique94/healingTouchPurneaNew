<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Add extends Component
{
    public $name, $status, $description;

    protected $rules = [
        'name' => 'required|string|max:255|unique:departments,name',
        'status' => 'required',
        'description' => 'nullable|string|max:500',
    ];

    public function resetData()
    {
        $this->reset(['name','status', 'description']);
    }

    public function store()
    {
        $this->validate();

        Department::create([
            'name' => $this->name,
            'status' => $this->status,
            'description' => $this->description,
        ]);

        $this->resetData();
        $this->dispatch('close-modal');
        $this->dispatch('refresh-department');
        $this->dispatch(  'success',__('Department Added successfully'));

       
    }

    public function render()
    {
        return view('livewire.admin.department.add');
    }
}
