<?php

namespace App\Livewire\Admin\Qualification;

use App\Models\Qualification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public function alertConfirm($id)
    {
        
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover.', qualId:$id);
    }
    
    public function delete($id)
    {
       
        Qualification::find($id)->delete();
        $this->dispatch('success', __('Qualification deleted successfully.'));
        $this->dispatch('refresh-department');
    }

    #[On('refresh-qualification')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $qualifications = Qualification::all();
        return view('livewire.admin.qualification.all',[
            'qualifications' => $qualifications,
        ]);
    }
}
