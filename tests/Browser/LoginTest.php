<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @throws Throwable
     */
    public function test_displays_sign_in_in_header(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Sign in');
        });
    }
}
