<?php

use App\Models\Product;

uses()->group('users');

it('creates product', function () {

    $request = [
        'name' => fake()->name(),
        'description' => fake()->text(),
        'quantity' => fake()->randomNumber(),
        'price' => fake()->randomFloat,
    ];

    login()->post('/products', $request);

    expect(Product::count())->toBe(1);
});

describe('When creating products', function () {
    it('provides a product name', function () {
        $request = [
            'name' => null,
            'description' => fake()->text(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomFloat,
        ];

        login()->post('/products', $request);

        expect(Product::count())->toBe(0);
    });

    it('provides a product name in string type', function () {
        $request = [
            'name' => 'Test Product',
            'description' => fake()->text(),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomFloat,
        ];

        login()->post('/products', $request);

        expect(Product::latest()->first()->name)->not->toBeNull()->toBeString();
    });
});
