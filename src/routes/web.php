<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::get('/mypage/profile', [ProfileController::class, 'edit']);
Route::get('/', [ItemController::class, 'index']);
Route::get('/sell', [SellController::class, 'index']);
Route::post('/sell', [SellController::class, 'store']);
Route::get('/item/{item_id}', [ItemController::class, 'show']);
Route::middleware('auth')->group(function () {
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);
    Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);

    Route::get('/purchase/address/{item_id}', [AddressController::class, 'edit']);
    Route::post('/purchase/address/{item_id}', [AddressController::class, 'update']);
});
Route::get('/mypage', [ProfileController::class, 'index']);
Route::post('/mypage/profile', [ProfileController::class, 'update']);
Route::middleware('auth')->group(function () {

    Route::post('/item/{item_id}/comment', [CommentController::class, 'store']);

    Route::post('/item/{item_id}/like', [LikeController::class, 'toggle']);

});