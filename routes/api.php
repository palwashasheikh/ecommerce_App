<?php

use App\Http\Controllers\orders_detailstController;
use App\Http\Controllers\orderstController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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







Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
   // Route::post('index', [ProductController::class, 'index']);
    Route::post('create_cart', [CartController::class, 'create_cart']);
    Route::patch('cart_update', [CartController::class, 'cart_update']);
    Route::delete('cart_delete', [CartController::class, 'cart_delete']);
    Route::get('order_details', [orders_detailstController::class, 'order_details']);
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('cart', [CartController::class, 'cart']);
    Route::post('add_orders', [orderstController::class, 'add_orders']);
    Route::patch('orders_update', [orderstController::class, 'orders_update']);
    Route::delete('orders_delete', [orderstController::class, 'orders_delete']);
    Route::delete('delete_order_details', [orders_detailstController::class, 'delete_order_details']);
    Route::patch('update_order_details', [orders_detailstController::class, 'update_order_details']);
    Route::patch('product_update', [ProductController::class, 'product_update']);
    Route::delete('product_delete', [ProductController::class, 'product_delete']);
    Route::post('add_products', [ProductController::class, 'add_products']);
});

