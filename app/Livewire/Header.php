<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public ?string $username = null;

    public ?string $image = null;

    #[On('user-authenticated')]
    public function showAuthenticatedItems(): void
    {
        $this->setUsername();
    }

    private function setUsername(): void
    {
        $user = auth()->user();

        if (isset($user)) {
            $this->username = $user->username;
            $this->image = $user->image;
        }
    }

    public function mount(): void
    {
        $this->setUsername();
    }

    public function render()
    {
        return view('livewire.header');
    }

    public function logout()
    {
        auth()->logout();
        $this->redirect('/');
    }
}
