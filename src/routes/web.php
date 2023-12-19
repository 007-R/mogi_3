<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {return view('items');});*/

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'detail']);
Route::get('/search', [ItemController::class, 'search']);
Route::get('/sell', [ItemController::class, 'sell']);
Route::post('/sell', [ItemController::class, 'sell_register']);
Route::post('/search', [ItemController::class, 'search']);
Route::post('/item/{id}/favorite', [ItemController::class, 'favorite']);
Route::post('/item/{id}/unfavorite', [ItemController::class, 'unfavorite']);
Route::get('/item/{id}/comment', [ItemController::class, 'comment']);
Route::post('/item/{id}/comment', [ItemController::class, 'comment_upload']);
Route::post('/item/{id}/comment/delete', [ItemController::class, 'comment_delete']);


Route::get('/purchase/{id}', [PurchaseController::class, 'purchase_info'])->middleware('auth');
Route::get('/purchase/setting/payment/{id}', [PurchaseController::class, 'pay_select']);
Route::get('/purchase/set/payment/{id}', [PurchaseController::class, 'pay_set']);
Route::get('/purchase/setting/address/{id}', [PurchaseController::class, 'address_input']);
Route::get('/purchase/set/address/{id}', [PurchaseController::class, 'address_set']);


Route::post('/purchase/order/{id}', [PurchaseController::class, 'order']);

Route::get('/mypage', [MypageController::class, 'index']);
Route::get('/mypage/profile', [MypageController::class, 'profile']);
Route::post('/mypage/profile', [MypageController::class, 'update']);



Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'index'])->name('admin_return');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout']);
    Route::post('create_master', [AdminController::class, 'master_creation']);
});

Route::prefix('admin')->middleware('auth:administrators')->group(function () {
    Route::get('/', [AdminController::class, 'master_edit']);
});


/*Route::prefix('master')->group(function () {
    Route::get('login', [MasterController::class, 'index'])->name('master_return');
    Route::post('login', [MasterController::class, 'login']);
    Route::post('logout', [MasterController::class, 'logout']);
    Route::post('edit', [MasterController::class, 'edit']);
    Route::post('message', [MasterController::class, 'message']);
});

Route::prefix('master')->middleware('auth.masters:masters')->group(function () {
    Route::get('/', [MasterController::class, 'shop_edit']);
});*/
