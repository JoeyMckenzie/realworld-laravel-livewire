<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Register;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }
}
