<?php

use App\Models\User;
use function Livewire\Volt\{rules, state, computed};

state([
    'includeUsername' => false,
    'username' => '',
    'email' => '',
    'password' => '',
]);

rules([
    'email' => 'required|email|unique:users,email',
    'username' => 'required|min:3|unique:users,username',
    'password' => 'required|min:3',
]);

$submitButtonText = computed(fn() => empty($this->username) ? 'Sign up' : 'Sign in');

$register = function () {
    $validatedRegisterForm = $this->validate();

    $user = User::create($validatedRegisterForm);
    auth()->login($user);
    $this->dispatch('user-authenticated');
    $this->redirect('/');
};

$login = function () {
    $validated = $this->validate();

    auth()->login($user);
    $this->dispatch('user-authenticated');
    $this->redirect('/');
};
?>

<form wire:submit="register">
    @if($includeUsername)
        <fieldset class="form-group">
            <input wire:model.live="username" id="register-username" class="form-control form-control-lg"
                   type="text" required
                   placeholder="Username"/>
        </fieldset>
    @endif
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
