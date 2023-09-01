<?php

use function Livewire\Volt\{state};

state(['errors' => []]);

?>

<ul class="error-messages">
    @foreach($errors as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
