<nav class="navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">conduit</a>
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item">
                <!-- Add "active" class when you're on that page" -->
                <a class="{{ Route::is('') ? 'nav-link active' : 'nav-link' }}" wire:navigate href="/">Home</a>
            </li>

            @if (isset($username))
                <li class="nav-item">
                    <a class="nav-link" href="/editor"> <i class="ion-compose"></i>&nbsp;New Article </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/settings"> <i class="ion-gear-a"></i>&nbsp;Settings </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" wire:navigate href="{{ '/profile/'.$username }}">
                        <img src="{{ url($image ?? '') }}" class="user-pic" alt="user profile"/>
                        {{ $username }}
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click="logout" href="#" class="nav-link">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="{{ Route::is('*login*') ? 'nav-link active' : 'nav-link' }}" wire:navigate href="/login">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('register*') ? 'nav-link active' : 'nav-link' }}" wire:navigate href="/register">Sign up</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
