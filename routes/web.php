<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AddtoCartController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'welcome')->name('home');
    Route::get('/product', 'product')->name('productpage');
    Route::get('/category', 'category')->name('categorypage');
    Route::get('/deal', 'deal')->name('dealpage');
});

Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/categories/{catId}', [CategoryController::class, 'categoryProducts'])->name('categoryProducts');
Route::get('/cart/{product}', [ProductController::class, 'productCart'])->name('productCart');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [ProductController::class, 'index'])->name('product.index');

    Route::group(['prefix' => '/product'], function () {
        Route::get('/create/product', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update'); //put method is used to update
        Route::delete('/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/new', [ProductController::class, 'new'])->name('product.new');
        Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
        Route::post('cart/add', [ProductController::class, 'addToCart'])->name('add-cart');
        Route::get('cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('remove');
        Route::get('/cart-details', [ProductController::class, 'cartDetails'])->name('cart-details');
        Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    });

    // Route::post('/addToCart/{product}', [AddtoCartController::class, 'addToCart'])->name('cart.add');
    // Route::post('cart/add/{id}', [AddtoCartController::class, 'addToCart'])->name('cart.add');


    Route::get('categoryIndex', [CategoryController::class, 'categoryIndex'])->name('category.index');
    Route::get('categoryCreate', [CategoryController::class, 'categoryCreate'])->name('category.create');
    Route::post('categoryStore', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('categoryEdit/{catId}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('categoryUpdate/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('categoryDelete/{catId}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    Route::get('categoryType', [CategoryController::class, 'categoryType'])->name('category.type');


    Route::group(['prefix' => '/deals'], function () {
        Route::get('/', [DealsController::class, 'index'])->name('deals.index');
        Route::get('/create', [DealsController::class, 'create'])->name('deals.create');
        Route::post('/store', [DealsController::class, 'store'])->name('deals.store');
        Route::get('/edit/{deals}', [DealsController::class, 'edit'])->name('deals.edit');
        Route::post('/update/{deals}', [DealsController::class, 'update'])->name('deals.update');
        Route::delete('/{deals}/destroy', [DealsController::class, 'destroy'])->name('deals.destroy');
        Route::get('/new', [DealsController::class, 'new'])->name('deals.new');
    });
});
