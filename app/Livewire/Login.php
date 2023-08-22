<?php

namespace App\Livewire;

use Livewire\Component;
use Symfony\Component\Routing\Annotation\Route;

#[Route("Login - Conduit")]
class Login extends Component
{


    public function render()
    {
        return view('livewire.login');
    }
}
