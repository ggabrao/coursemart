<?php

use App\Models\User;
use PHPUnit\Framework\ExpectationFailedException;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\LazilyRefreshDatabase::class,
)->in('Feature', 'Unit');

function login($user = null)
{
    return test()->actingAs($user ?? User::factory()->create());
}


expect()->extend('toHaveMinLength', function () {
    if (strlen($this->value) < 2) {
        throw new ExpectationFailedException('Minimum length is 2 characters');
    }
});

expect()->extend('toHaveMaxLength', function () {
    if (strlen($this->value) > 20) {
        throw new ExpectationFailedException('Max length is 20 characters');
    }
});
