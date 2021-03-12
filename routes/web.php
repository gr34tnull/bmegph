<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EndorserController;
use App\Http\Controllers\BloodlineController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowcaseController;

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

Route::get('/', function () {
    return view('auth.register');
});

Route::resources([
    'endorsers' => EndorserController::class,
    'bloodlines' => BloodlineController::class,
    'galleries' => GalleryController::class,
    'products' => ProductController::class,
    'showcase' => ShowcaseController::class,
]);

Route::prefix('endorser')->group(function () {
    Route::get('/nationals', 'App\Http\Controllers\EndorserController@national')->name('nationals');
    Route::get('/regionals', 'App\Http\Controllers\EndorserController@regional')->name('regionals');
});

Route::prefix('product')->group(function () {
    Route::get('/list', 'App\Http\Controllers\ProductController@list')->name('products.list');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
