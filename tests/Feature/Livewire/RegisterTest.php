<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Register;
use App\Models\User;
use Livewire\Livewire;

describe('register', function () {
    it('should render successfully', function () {
        Livewire::test(Register::class)
            ->assertStatus(200);
    });

    it('should register a user when all required fields are filled', function () {
        // arrange
        expect(User::count())->toBe(0);

        // act
        Livewire::test(Register::class)
            ->set('username', 'test1')
            ->set('email', 'test1@gmail.com')
            ->set('password', 'password')
            ->call('register');

        // assert
        expect(User::count())->toBe(1);
    });

    it('should not register a user when required fields are missing', function () {
        // arrange
        expect(User::count())->toBe(0);

        // act
        Livewire::test(Register::class)
            ->set('username', 'test1')
            ->set('password', 'password')
            ->call('register');

        // assert
        expect(User::count())->toBe(0);
    });

    it('should not register a user when the username already taken', function () {
        // arrange
        User::create([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'password',
        ]);

        expect(User::count())->toBe(1);

        // act
        Livewire::test(Register::class)
            ->set('username', 'user1')
            ->set('email', 'user1email@gmail.com')
            ->set('password', 'password')
            ->call('register');

        // assert
        expect(User::count())->toBe(1);
        expect(User::firstWhere('email', 'user1email@gmail.com'))->toBeNull();
    });

    it('should not register a user when the email already taken', function () {
        // arrange
        User::create([
            'username' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => 'password',
        ]);

        expect(User::count())->toBe(1);

        // act
        Livewire::test(Register::class)
            ->set('username', 'user1username')
            ->set('email', 'user1@gmail.com')
            ->set('password', 'password')
            ->call('register');

        // assert
        expect(User::count())->toBe(1);
        expect(User::firstWhere('username', 'user1username'))->toBeNull();
    });
});
