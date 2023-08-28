<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class Register extends Form
{
    #[Rule('required|unique:users,username')]
    public string $username = '';

    #[Rule('required|email|unique:users,email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';
}
