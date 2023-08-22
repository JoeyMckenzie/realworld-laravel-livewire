<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Symfony\Component\Routing\Annotation\Route;

#[Route("Register - Conduit")]
class Register extends Component
{
    #[Rule('required|unique:users,username')]
    public string $username = '';

    #[Rule('required|email|unique:users,email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public bool $authenticated = false;

    public function save(): void
    {
        $validatedRegisterForm = $this->validate();
        $userId = (string) Str::uuid();

        $user = User::create(['id' => $userId, ...$validatedRegisterForm]);
        $user->createToken('auth');

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
