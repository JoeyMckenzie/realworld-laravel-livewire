<?php

use Livewire\Volt\Volt;

describe('auth form', function () {
    it('can render', function () {
        $component = Volt::test('auth-form');
        $component->assertSee('');
    });

    it('dislays no form errors initially', function () {

    });
});
