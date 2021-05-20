<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\OrderItemController as AdminOrderItemController;
use App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category_id}', [CategoryController::class, 'show']);
Route::get('/{category_name}', [CategoryController::class, 'showCategoryName']);
Route::get('/category/{category_id}/sub_category/{sub_category_id}', [CategoryController::class, 'showSubCategory']);
Route::get('/category/sort-price/{sort}', [CategoryController::class, 'sortPrice']);
Route::get('/category/sort-price/{sort}/category/{category_id}', [CategoryController::class, 'sortPriceCategory']);
Route::get('/category/sort-price/{sort}/category/{category_id}/sub_category/{sub_category_id}', [CategoryController::class, 'sortPriceCategoryAndSubCategory']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/user/profile', [UserProfileController::class, 'index']);
    Route::patch('/user/profile/{user_id}', [UserProfileController::class, 'update']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('users', AdminUserController::class)->parameters(['users' => 'admin_user',]);
        Route::prefix('products')->group(function () {
            Route::resource('/', AdminProductController::class)->parameters(['' => 'admin_product',]);
            Route::get('{admin_product}/product_images', [AdminProductImageController::class, 'index']);
        });

        Route::prefix('orders')->group(function () {
            Route::resource('/', AdminOrderController::class)->parameters(['' => 'admin_order']);

            Route::prefix('{admin_order}')->group(function () {
                Route::resource('order_item', AdminOrderItemController::class)->parameters(['order_item' => 'admin_order_item']);
            });
        });
    });
});

Auth::routes();
