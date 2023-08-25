<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login - Conduit')]
class Login extends Component
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public bool $displayInvalidLoginAttempt = false;

    public function mount(): void
    {
        if (auth()->user()?->exists()) {
            $this->redirect('/');
        }
    }

    public function login(): void
    {
        $this->displayInvalidLoginAttempt = false;
        $validatedLoginForm = $this->validate();

        if (auth()->attempt($validatedLoginForm)) {
            $this->dispatch('user-authenticated')->to(Header::class);
            $this->redirect('/');
        } else {
            $this->displayInvalidLoginAttempt = true;
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
