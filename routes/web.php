<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AddtoCartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'welcome')->name('home');
    Route::get('/product', 'product')->name('productpage');
    Route::get('/products/filter', [ProductController::class, 'filterProducts'])->name('products.filter');
    Route::get('/category', 'category')->name('categorypage');
    Route::get('/deal', 'deal')->name('dealpage');
    Route::post('/search', 'search')->name('searchproduct');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/profile/orders', [OrderController::class, 'show'])->name('profile'); // User's orders view

});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::post('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile.update-email');
    Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Auth::routes();
Route::get('/dashboard', [ProductController::class, 'index'])->name('product.index');
Route::group(['prefix' => '/product'], function () {
    Route::get('/create/product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update'); //put method is used to update
    Route::delete('/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/new', [ProductController::class, 'new'])->name('product.new');
    Route::get('/cart/{product}', [ProductController::class, 'productCart'])->name('productCart');
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::post('cart/add', [ProductController::class, 'addToCart'])->name('add-cart');
    Route::get('cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('remove');
    Route::get('/cart-details', [ProductController::class, 'cartDetails'])->name('cart-details');
    Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/sort_product', [ProductController::class, 'sortProduct'])->name('sort_product');
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // Admin orders view
    });



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

Route::get('/categories/{catId}', [CategoryController::class, 'categoryProducts'])->name('categoryProducts');

Route::group(['prefix' => '/deals'], function () {
    Route::get('/', [DealsController::class, 'index'])->name('deals.index');
    Route::get('/create', [DealsController::class, 'create'])->name('deals.create');
    Route::post('/store', [DealsController::class, 'store'])->name('deals.store');
    Route::get('/edit/{deals}', [DealsController::class, 'edit'])->name('deals.edit');
    Route::post('/update/{deals}', [DealsController::class, 'update'])->name('deals.update');
    Route::delete('/{deals}/destroy', [DealsController::class, 'destroy'])->name('deals.destroy');
    Route::get('/new', [DealsController::class, 'new'])->name('deals.new');
});
// Route::get('/role',[RoleController::class, 'index'])->name('role.index');
Route::group(['prefix' => '/role'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('role.index');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
   
});
