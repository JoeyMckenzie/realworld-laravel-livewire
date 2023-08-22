<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home - Conduit')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
