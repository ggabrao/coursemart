<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $items = DB::table('items')
            ->join('item_product', 'items.id', '=', 'item_product.item_id')
            ->join('products', 'item_product.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', DB::raw('SUM(items.quantity) AS total_quantity'), 'products.price', DB::raw('(SUM(items.quantity) * products.price) AS subtotal'))
            ->where('items.user_id', Auth::id())
            ->groupBy('products.id')
            ->get();

        $total = $items->sum('subtotal');

        return view('items.index', ['items' => $items, 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->get('product_id'));

        if ($request->get('quantity') > $product->quantity or $request->get('quantity') <= 0) {

            return redirect(route('dashboard'))->with('error', 'Invalid quantity');

        } else {

            $request->user()->items()->create($request->all())->products()->attach($product->id);

            $product->update(['quantity' => $product->quantity - $request->get('quantity')]);

            return redirect(route('dashboard'))->with('success', 'Product added to cart');
        }
    }
}
