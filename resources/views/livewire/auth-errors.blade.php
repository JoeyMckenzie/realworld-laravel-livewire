<?php

use function Livewire\Volt\{state};

state(['errors']);

?>

<ul class="error-messages">
    @foreach($errors as $error)
        <li>{{ $error  }}</li>
    @endforeach
    
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
