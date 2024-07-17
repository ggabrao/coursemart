<?php

use App\Models\Product;
use App\Models\User;

uses()->group('users');

it('creates product', function () {
    $user = User::factory()->create();
    $request = [
        'name' => fake()->name(),
        'description' => fake()->text(),
        'quantity' => fake()->randomNumber(),
        'price' => fake()->randomFloat,
    ];

    $this->actingAs($user)->post('/products', $request);

    expect(Product::count())->toBe(1);
});

describe('When creating products', function () {
    it('provides a product name', function () {
        $user = User::factory()->create();
        $request = [
            'name' => null,
            'description' => fake()->text(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomFloat,
        ];

        $this->actingAs($user)->post('/products', $request);

        expect(Product::count())->toBe(0);
    });

    it('provides a product name in string type', function () {
        $user = User::factory()->create();
        $request = [
            'name' => null,
            'description' => fake()->text(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomFloat,
        ];

        $this->actingAs($user)->post('/products', $request);

        expect(Product::latest()->first()->name)->not->toBeNull()->toBeString();
    });
});
