<?php
namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public $search = '';

    public function alertConfirm($id)
    {
        $this->dispatch('swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', userId: $id);
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
        $user = User::query()
            ->where('role', '!=', 'doctor')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->get();

        return view('livewire.admin.user.all', [
            'users' => $user,
        ]);
    }
}
