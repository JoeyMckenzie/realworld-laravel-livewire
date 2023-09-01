<?php

use App\Models\User;
use function Livewire\Volt\{state};

state([
    'includeUsername' => false,
    'username' => '',
    'email' => '',
    'password' => '',
]);

$submitButtonText = fn() => $this->includeUsername ? 'Sign up' : 'Sign in';

$submit = fn() => $this->includeUsername ? $this->register() : $this->login();

$register = function () {
    $validated = $this->validate([
        'email' => 'required|email|unique:users,email',
        'username' => 'required|min:3|unique:users,username',
        'password' => 'required|min:3',
    ]);

    $user = User::create($validated);

    auth()->login($user);
    $this->dispatch('user-authenticated');
    $this->redirect('/');
};

$login = function () {
    $validated = $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt($validated)) {
        $this->dispatch('user-authenticated');
        $this->redirect('/');
    } else {
        $this->addError('credentials', 'username or password is invalid');
    }
};
?>

<div>
    @if ($errors->any())
        <livewire:auth-errors :errors="$errors->all()"/>
    @endif

    <form wire:submit="submit">
        @if($includeUsername)
            <fieldset class="form-group">
                <input wire:model.live="username" id="auth-username" class="form-control form-control-lg"
                       type="text" required
                       placeholder="Username"/>
            </fieldset>
        @endif
        <fieldset class="form-group">
            <input wire:model="email" id="auth-email" class="form-control form-control-lg" type="email"
                   required
                   placeholder="Email"/>
        </fieldset>
        <fieldset class="form-group">
            <input wire:model="password" id="auth-password" class="form-control form-control-lg"
                   type="password" required
                   placeholder="Password"/>
        </fieldset>
        <button class="btn btn-lg btn-primary pull-xs-right" id="auth-submit"
                type="submit">{{ $this->submitButtonText() }}
        </button>
    </form>
</div>


