<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Login;
use App\Models\User;
use Livewire\Livewire;

describe('login', function () {
    it('should render successfully', function () {
        Livewire::test(Login::class)
            ->assertStatus(200);
    });

    it('should login an existing user when all required fields are filled', function () {
        // arrange
        User::create([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'password',
        ]);

        expect(User::count())->toBe(1);

        // act
        Livewire::test(Login::class)
            ->set('username', 'test1@gmail.com')
            ->set('password', 'password')
            ->call('login');

        // assert
        expect(User::count())->toBe(1);
    });

    it('should not register a user when required fields are missing', function () {
        // arrange
        expect(User::count())->toBe(0);

        // act
        Livewire::test(Login::class)
            ->set('username', 'test1')
            ->set('password', 'password')
            ->call('login');

        // assert
        expect(User::count())->toBe(0);
    });
});
