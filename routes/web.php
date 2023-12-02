<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
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

Route::get('/shop', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('shop');

Route::get('/collections', [CollectionController::class, 'list'])->middleware(['verify.shopify'])->name('collection.list');
Route::get('/collections/create', [CollectionController::class, 'createForm'])->middleware(['verify.shopify'])->name('collection.form');
Route::post('/collections', [CollectionController::class, 'store'])->middleware(['verify.shopify'])->name('collection.store');
Route::get('collections/edit/{id}', [CollectionController::class, 'edit'])->middleware(['verify.shopify'])->name('collection.edit-form');
Route::put('/collections/update/{id}', [CollectionController::class, 'update'])->middleware(['verify.shopify'])->name('collection.update');


Route::get('/products', [ProductController::class, 'list'])->middleware(['verify.shopify'])->name('product.list');
Route::get('/products/create', [ProductController::class, 'createForm'])->middleware(['verify.shopify'])->name('product.form');
Route::post('/products', [ProductController::class, 'store'])->middleware(['verify.shopify'])->name('product.store');
Route::get('products/edit/{id}', [ProductController::class, 'edit'])->middleware(['verify.shopify'])->name('product.edit-form');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->middleware(['verify.shopify'])->name('product.update');

Route::get('products/collections/{id}', [ProductController::class, 'getProductByCollection'])->middleware(['verify.shopify'])->name('product.collection');
