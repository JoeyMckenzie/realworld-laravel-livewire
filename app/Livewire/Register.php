<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register - Conduit')]
class Register extends Component
{
    #[Rule('required|unique:users,username')]
    public string $username = '';

    #[Rule('required|email|unique:users,email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function mount(): void
    {
        if (auth()->user()?->exists()) {
            $this->redirect('/');
        }
    }

    public function register(): void
    {
        $validatedRegisterForm = $this->validate();

        $user = User::create($validatedRegisterForm);
        $user->createToken('auth');
        auth()->login($user);
        $this->dispatch('user-authenticated')->to(Header::class);

        $this->redirect('/');
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.register');
    }
}
