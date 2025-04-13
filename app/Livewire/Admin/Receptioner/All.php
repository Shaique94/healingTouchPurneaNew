<?php

namespace App\Livewire\Admin\Receptioner;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.receptioner.all');
    }
}
