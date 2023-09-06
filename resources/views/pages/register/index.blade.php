<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use function Laravel\Folio\{middleware, name};

middleware([RedirectIfAuthenticated::class]);

name('register.index');

?>

<x-layouts.app title="Register">
    <div class="auth-page">
        <div class="container page">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-xs-12">
                    <h1 class="text-xs-center">Sign up</h1>
                    <p class="text-xs-center">
                        <a wire:navigate href="{{ route('login.index') }}">Have an account?</a>
                    </p>
                    <livewire:auth-form :includeUsername="true"/>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
