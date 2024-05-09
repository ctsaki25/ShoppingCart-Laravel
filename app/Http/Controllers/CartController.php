<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cartItem = new CartItem([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
            $cartItem->save();
        }

        return $request->wantsJson() ? response()->json($cartItem) : redirect()->route('dashboard')->with('success', 'Product added to cart!');
    }

    public function remove(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }

        return $request->wantsJson() ? response()->json(null, 204) : redirect()->route('dashboard')->with('success', 'Item removed from cart!');
    }

    public function index(Request $request)
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
        $cartItems = $cart ? $cart->items : collect();

        return $request->wantsJson() ? response()->json($cartItems) : view('dashboard', compact('cartItems'));
    }
}