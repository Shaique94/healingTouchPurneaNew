<?php

namespace App\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public $nav=false;

    public function togglenav(){

        $this->nav= !$this->nav;
    }
    public function render()
    {
        return view('livewire.admin');
    }
}
