<?php

use App\Models\User;
use function Livewire\Volt\{state, rules};
use function Laravel\Folio\{name};

name('login.index');

state([
    'email' => '',
    'password' => '',
]);

rules([
    'email' => 'required|email',
    'password' => 'required',
]);

$login = function () {
    $validated = $this->validate();

    auth()->login($user);
    $this->dispatch('user-authenticated');
    $this->redirect('/');
};
?>

<x-layouts.app>
    @volt('login.index')
    <div class="auth-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign in</h1>
                    <p class="text-xs-center">
                        <a wire:navigate href="{{ route('register.index') }}">Need an account?</a>
                    </p>

                    <ul class="error-messages">
                        @error('email')
                        <li>{{ $message }}</li>
                        @enderror

                        @error('password')
                        <li>{{ $message }}</li>
                        @enderror
                    </ul>

                    <livewire:auth-form/>
                </div>
            </div>
        </div>
    </div>
    @endvolt
</x-layouts.app>
