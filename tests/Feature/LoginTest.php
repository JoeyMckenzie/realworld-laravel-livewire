<?php

describe('login page', function () {
    it('renders the auth form', function () {
        $this->get('/login')
            ->assertSeeVolt('auth-form');
    });
});
