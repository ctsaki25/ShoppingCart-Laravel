<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return $request->wantsJson() ? response()->json($products) : view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validated);

        return $request->wantsJson() ? response()->json($product, 201) : redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function getProducts(){
        $arrayProducts = Product::all();
        return response($arryProducts, 201);
    }

    public function getProduct($search){
        $arrayProducts = Product::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('description', 'LIKE', '%'.$search.'%')
                        ->get();
        return response($arrayProducts, 201);
    }

    public function show(Product $product, Request $request)
    {
        return $request->wantsJson() ? response()->json($product) : view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        return $request->wantsJson() ? response()->json($product) : redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product, Request $request)
    {
        $product->delete();

        return $request->wantsJson() ? response()->json(null, 204) : redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}