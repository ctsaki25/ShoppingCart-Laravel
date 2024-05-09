<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::resource('/products', ProductController::class)->middleware('auth');

Route::get('/dashboard', [CartController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::post('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::post('/cart/remove/{cart}', [CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cartItems', DashboardController::class)->middleware('auth');


});

require __DIR__.'/auth.php';
