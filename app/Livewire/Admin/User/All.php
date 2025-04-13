<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public function alertConfirm($id)
    {
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', userId: $id);
 
    }

    public function delete($id)
    {
        User::find($id)?->delete();
        $this->dispatch('success', __('User deleted successfully.'));
    }
    #[On('refresh-user')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $user = User::where('role', "!=", 'doctor')->get();

        return view('livewire.admin.user.all', [
            'users' => $user,

        ]);
    }
}
