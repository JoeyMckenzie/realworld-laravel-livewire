<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.header');
    }

    public function logout(): void
    {
        auth()->logout();
        $this->redirect('/');
    }
}
