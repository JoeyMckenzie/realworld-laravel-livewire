<div class="auth-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xs-12">
                <h1 class="text-xs-center">Sign in</h1>
                <p class="text-xs-center">
                    <a wire:navigate href="/register">Need an account?</a>
                </p>

                <ul class="error-messages">
                    @error('username')
                    <li>{{ $message }}</li>
                    @enderror

                    @error('email')
                    <li>{{ $message }}</li>
                    @enderror

                    @if ($displayInvalidLoginAttempt)
                        <li>email or password is invalid</li>
                    @endif
                </ul>

                <form wire:submit="login">
                    <fieldset class="form-group">
                        <input wire:model="email" class="form-control form-control-lg" type="text" placeholder="Email"/>
                    </fieldset>
                    <fieldset class="form-group">
                        <input wire:model="password" class="form-control form-control-lg" type="password" placeholder="Password"/>
                    </fieldset>
                    <button type="submit" class="btn btn-lg btn-primary pull-xs-right">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
