<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

######## routes for guests ########
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::post('login-form', [AuthController::class, 'login'])->name('loginForm');
});

######## routes for Auth users ########
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'admin',
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'
], function () {
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
    ]);
    Route::get('change-lang', [GeneralController::class, 'changeLang'])->name('changeLang');
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
