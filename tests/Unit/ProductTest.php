<?php

use App\Models\Product;
use App\Models\User;

uses()->group('products');

it('belongs to a user', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create(['user_id' => $user->id]);

    expect($product->user->is($user))->toBeTrue();
});
