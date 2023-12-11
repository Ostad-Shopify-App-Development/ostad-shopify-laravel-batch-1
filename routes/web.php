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




Route::match(['GET', 'POST'], '/auth', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth');

Route::group(['middleware' => ['verify.shopify']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
        ->name('product.index');

    Route::get('/groups', [\App\Http\Controllers\FaqController::class, 'groupIndex'])
        ->name('group.index');

    Route::post('/groups', [\App\Http\Controllers\FaqController::class, 'groupStore'])
        ->name('group.save');

    Route::get('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
        ->name('group.faqs');

    Route::post('/faqs/{groupid}', [\App\Http\Controllers\FaqController::class, 'faqs'])
        ->name('group.faqs.save');

    Route::get('/settings', [\App\Http\Controllers\SettingController::class, 'page'])
        ->name('setting.index');

    Route::post('/settings', [\App\Http\Controllers\SettingController::class, 'store'])
        ->name('setting.store');

    Route::get('/ui/components', [\App\Http\Controllers\UIController::class, 'uiComponents'])->name('ui.components');
});

Route::get('/storefront/widgets/general-faq/{groupid}',
    [\App\Http\Controllers\WidgetController::class, 'showGeneralFaqWidget'])
    ->name('widget.general-faq');

