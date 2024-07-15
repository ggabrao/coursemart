<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function edit(User $user, Product $product): bool
    {
        return $product->user->is($user);
    }


    public function delete(User $user, Product $product): bool
    {
        return $this->edit($user, $product);
    }


}
