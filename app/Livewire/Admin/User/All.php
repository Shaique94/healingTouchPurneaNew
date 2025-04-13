<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
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
