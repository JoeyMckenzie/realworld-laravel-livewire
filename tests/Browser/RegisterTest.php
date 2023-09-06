<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class RegisterTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @throws Throwable
     */
    public function test_displays_sign_up_in_header(): void
    {
        $this->browse(fn (Browser $browser) => $browser
            ->visit('/register')
            ->assertSee('Sign up'));
    }

    /**
     * A Dusk test example.
     *
     * @throws Throwable
     */
    public function test_registering_valid_user_redirects_to_home(): void
    {
        // arrange
        $this->browse(fn (Browser $browser) => $browser
            ->visit('/register'));

        $this->assertEquals(0, User::count());

        // act
        $this->browse(fn (Browser $browser) => $browser
            ->type('#auth-email', 'user1@gmail.com')
            ->type('#auth-username', 'user1')
            ->type('#auth-password', 'password'));

        $this->browse(fn (Browser $browser) => $browser
            ->click('#auth-submit'));

        $this->browse(fn (Browser $browser) => $browser
            ->waitForLivewireToLoad());

        // assert
        $this->assertEquals(1, User::count());
    }
}
