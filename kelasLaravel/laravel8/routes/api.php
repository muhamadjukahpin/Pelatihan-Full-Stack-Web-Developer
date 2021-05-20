<?php

use App\Http\Controllers\Api\CityController as ApiCityController;
use App\Http\Controllers\Api\SubCategoryController as ApiSubCategoryController;
use App\Http\Controllers\Api\ProductImageController as ApiProductImageController;
use App\Http\Controllers\Api\ProductSizeController as ApiProductSizeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;
use App\Http\Controllers\Api\OrderItemController as ApiOrderItemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', ApiUserController::class)->except(['create', 'edit']);
Route::resource('products', ApiProductController::class)->except(['create', 'edit']);
Route::get('products/skip/{count}/take/{take}', [ApiProductController::class, 'loadMore']);
Route::post('/products/{product_id}/product_images', [ApiProductImageController::class, 'store']);
Route::delete('/products/{product_id}/product_images/{image_id}', [ApiProductImageController::class, 'destroy']);
Route::post('/products/{product_id}/product_sizes', [ApiProductSizeController::class, 'store']);
Route::delete('/products/{product_id}/product_sizes/{size_id}', [ApiProductSizeController::class, 'destroy']);

Route::prefix('orders')->group(function () {
    Route::resource('/', ApiOrderController::class)->except(['create', 'edit'])->parameters(['' => 'order']);
    Route::get('{order}/order_item/list', [ApiOrderItemController::class, 'list']);
    Route::resource('{order}/order_item', ApiOrderItemController::class)->except(['create']);
});

Route::get('/city/{province_id}', [ApiCityController::class, 'index']);
Route::get('/sub_category/{category_id}', [ApiSubCategoryController::class, 'index']);
