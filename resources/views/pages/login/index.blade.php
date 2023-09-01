<?php

use function Laravel\Folio\{name};

name('login.index');

?>

<x-layouts.app>
    <div class="auth-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign in</h1>
                    <p class="text-xs-center">
                        <a wire:navigate href="{{ route('register.index') }}">Need an account?</a>
                    </p>
                    <livewire:auth-form/>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
