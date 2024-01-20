<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::post('/', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// User
Route::get('/users', [UserController::class, 'users']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'edit']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

// Category
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy']);

// Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// Wallet
Route::get('/balance/add', [WalletController::class, 'create']);
Route::post('/balance/add', [WalletController::class, 'add_balance']);
Route::get('/balances', [WalletController::class, 'all']);
Route::post('/balance/{id}/approve', [WalletController::class, 'approve']);
Route::get('/balance/create', [WalletController::class, 'add']);
Route::post('/balance/create', [WalletController::class, 'add_post']);
Route::get('/balance/withdraw', [WalletController::class, 'withdraw']);
Route::post('/balance/withdraw', [WalletController::class, 'withdraw_post']);

// Transaction
Route::post('/addcart/{id}', [TransactionController::class, 'addCart']);
Route::get('/cart', [TransactionController::class, 'cart']);
Route::post('/cart', [TransactionController::class, 'payCart']);
Route::get('/cart/invoice', [TransactionController::class, 'invoice']);