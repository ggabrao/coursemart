<?php

use App\Models\Product;

uses()->group('users');

it('stores product', function () {

    $request = [
        'name' => 'Test Product',
        'description' => 'Test Description',
        'quantity' => 5,
        'price' => 5.99,
    ];

    login()->post('/products', $request);

    expect(Product::count())->toBe(1);
});

describe('when creating products', function () {
    it('provides a product name', function () {

        $request = [
            'name' => null,
            'description' => 'Test Description',
            'quantity' => 5,
            'price' => 5.99,
        ];

        login()->post('/products', $request);

        expect(Product::count())->toBe(0);
    });

    it('provides a product name in string type', function () {

        $request = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'quantity' => 5,
            'price' => 5.99,
        ];

        login()->post('/products', $request);

        expect(Product::latest()->first()->name)->not->toBeEmpty()->toBeString();
    });
});

it('stores a product with all the validations requirements', function () {

    $request = [
        'name' => 'Test Product',
        'description' => 'Test Description',
        'quantity' => 5,
        'price' => 5.99,
    ];

    login()->post('/products', $request);

    expect(Product::latest()->first())
        ->name->toBeString()->not->toBeEmpty()->toHaveMinLength()
        ->description->toBeString()->not->toBeEmpty()->toHaveMaxLength()
        ->quantity->toBeInt()->not->toBeEmpty()->toBeGreaterThanOrEqual(2)
        ->price->toBeNumeric()->not->toBeEmpty()->toBeGreaterThan(0);
});


