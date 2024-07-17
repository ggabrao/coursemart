<?php

use App\Models\User;

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\LazilyRefreshDatabase::class,
)->in('Feature', 'Unit');

function login($user = null)
{
    return test()->actingAs($user ?? User::factory()->create());
}

