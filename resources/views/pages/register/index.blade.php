<?php

use function Livewire\Volt\{state};

state([
])

?>

<x-layouts.app>
    @volt('register')
        <div class="auth-page">
            <div class="container page">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-xs-12">
                        <h1 class="text-xs-center">Sign up</h1>
                        <p class="text-xs-center">
                            <a wire:navigate href="/login">Have an account?</a>
                        </p>

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
                </div>
            </div>
        </div>
    @endvolt
</x-layouts.app>
