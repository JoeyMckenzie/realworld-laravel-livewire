<?php

use App\Models\User;
use function Laravel\Folio\{name};
use function Livewire\Volt\{rules, state};

state([
    'username' => '',
    'email' => '',
    'password' => '',
]);

rules([
    'email' => 'required|email|unique:users,email',
    'username' => 'required|min:3|unique:users,username',
    'password' => 'required|min:3',
]);

$register = function () {
    $validatedRegisterForm = $this->validate();

    $user = User::create($validatedRegisterForm);
    auth()->login($user);
    $this->dispatch('user-authenticated');
    $this->redirect('/');
};
?>

<div>
    <ul class="error-messages">
        @error('username')
        <li>{{ $message }}</li>
        @enderror

        @error('email')
        <li>{{ $message }}</li>
        @enderror

        @error('password')
        <li>{{ $message }}</li>
        @enderror
    </ul>

    <form wire:submit="register">
        <fieldset class="form-group">
            <input wire:model.live="username" id="register-username" class="form-control form-control-lg"
                   type="text" required
                   placeholder="Username"/>
        </fieldset>
        <fieldset class="form-group">
            <input wire:model="email" id="register-email" class="form-control form-control-lg" type="email"
                   required
                   placeholder="Email"/>
        </fieldset>
        <fieldset class="form-group">
            <input wire:model="password" id="register-password" class="form-control form-control-lg"
                   type="password" required
                   placeholder="Password"/>
        </fieldset>
        <button class="btn btn-lg btn-primary pull-xs-right" id="register-submit" type="submit">Sign up
        </button>
    </form>
</div>
