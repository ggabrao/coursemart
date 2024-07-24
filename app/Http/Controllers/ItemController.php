<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('items.index', ['items' => Item::where('user_id', Auth::id())->get(), 'product' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->get('product_id'));

        if ($request->get('stock') > $product->stock or $request->get('quantity') <= 0) {

            return redirect(route('dashboard'))->with('error', 'Invalid quantity');

        } else {

            $request->user()->items()->create($request->all());

            $product->update(['stock' => $product->stock - $request->get('quantity')]);

            return redirect(route('dashboard'))->with('success', 'Product added to cart');
        }
    }
}
