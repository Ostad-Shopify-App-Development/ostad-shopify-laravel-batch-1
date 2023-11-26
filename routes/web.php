<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
    ->middleware(['verify.shopify'])->name('product.index');

Route::get('/groups', [\App\Http\Controllers\FaqController::class, 'groupIndex'])
    ->middleware(['verify.shopify'])
    ->name('group.index');

Route::post('/groups', [\App\Http\Controllers\FaqController::class, 'groupStore'])
    ->middleware(['verify.shopify'])
    ->name('group.save');



Route::get('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
    ->middleware(['verify.shopify'])
    ->name('group.faqs');
Route::post('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
    ->middleware(['verify.shopify'])
    ->name('group.faqs.save');



