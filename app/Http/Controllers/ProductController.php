<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Mail\ProductPosted;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard', ['products' => Product::with('user')->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $product = $request->user()->products()->create($validated);

        Mail::to($product->user)->queue(new ProductPosted($product));

        return redirect(route('dashboard'))->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {

        $validated = $request->validated();

        $product->update($validated);

        return redirect(route('dashboard'))->with('success', "Product updated successfully!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect(route('dashboard'))->with('success', "Product deleted successfully!");

    }

    public function cart(Product $product): View
    {
        $items = Product::find(Auth::id());
        return view('cart', [$items]); //todo:agrupar por nome do produto
    }
}
