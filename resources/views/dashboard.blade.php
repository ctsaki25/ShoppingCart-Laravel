@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="w-full p-4">
        <form action="{{ route('dashboard') }}" method="GET" class="flex justify-center">
            <input type="text" name="search" placeholder="Search products..." class="px-4 py-2 border rounded" value="{{ old('search', $search) }}" style="flex-grow: 1; max-width: 600px;">
            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded text-sm">
                Search
            </button>
        </form>
    </div>
    <div class="flex flex-wrap justify-between">
        <div class="w-full md:w-2/3 lg:w-3/4 p-4">
            <h2 class="font-bold text-xl text-white mb-4">Available Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($products as $product)
                <div class="bg-white rounded shadow p-4">
                    <h5 class="text-lg font-bold">{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <div class="mt-2 flex justify-between items-center">
                        <span class="text-gray-900">${{ number_format($product->price, 2) }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded text-sm">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-full md:w-1/3 lg:w-1/4 p-4 rounded-xl sticky top-4">
            <h2 class="font-bold text-xl text-white mb-4">Shopping Cart</h2>
            <div class="flex flex-col justify-between bg-white rounded-lg shadow-inner p-4">
                @forelse ($cartItems as $item)
                <div class="flex justify-between items-center mb-2 p-2 rounded shadow">
                    <div>
                        <h5>{{ $item->product->name }}</h5>
                        <p>Qty: {{ $item->quantity }} | Price: ${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                    </div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded text-sm">
                            Remove
                        </button>
                    </form>
                </div>
                @empty
                <p>Your cart is empty.</p>
                @endforelse
                @if ($cartItems->isNotEmpty())
                <div class="p-4 mt-4 bg-blue-100 rounded shadow">
                    <h3 class="font-bold text-lg">Total: ${{ $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                }) }}</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
