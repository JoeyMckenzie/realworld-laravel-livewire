<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home - Conduit')]
class Home extends Component
{
    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.home');
    }
}
