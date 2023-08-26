<?php

declare(strict_types=1);

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @throws Throwable
     */
    public function test_displays_sign_up_in_header(): void
    {
        $this->browse(fn (Browser $browser) => $browser
            ->visit('/')
            ->assertSee('Sign up'));
    }
}
