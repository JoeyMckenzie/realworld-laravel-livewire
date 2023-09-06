<?php

describe('register page', function () {
    it('renders the auth form', function () {
        $this->get('/register')
            ->assertSeeVolt('auth-form');
    });
});
