<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search', '');

    $products = Product::where('name', 'like', '%' . $search . '%')->get(); 
    $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();
    $cartItems = $cart ? $cart->items : collect(); 

    return view('dashboard', compact('products', 'cartItems', 'search'));
}
}