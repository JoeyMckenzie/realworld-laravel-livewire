<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Header extends Component
{
    public bool $authenticated = false;

    public function render()
    {
        return view('components.header');
    }
}
