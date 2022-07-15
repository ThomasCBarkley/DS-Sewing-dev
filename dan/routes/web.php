<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomPriceGeneratorController;
use App\Http\Controllers\PoolWizard\IndexController;
use App\Http\Controllers\PoolWizard\PlotController;
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
    return;
});

Route::post('/dan/incart', [CartController::class, 'postInCart']);

Route::prefix('/dan/tinycart')->group(function () {
    Route::get('/', [CartController::class, 'getCart']);
    Route::post('/', [CartController::class, 'postUpdate']);

    Route::get('checkout', [CheckoutController::class, 'getIndex']);
    Route::get('checkout/{id}', [CheckoutController::class, 'getStep']);
    Route::post('checkout/{id}', [CheckoutController::class, 'postStep']);

    Route::get('order/{id}', [CheckoutController::class, 'getOrder']);
});


Route::prefix('/dan/pid')->group(function () {
    Route::get('/', [CustomPriceGeneratorController::class, 'getIndex']);
    Route::post('pidgen', [CustomPriceGeneratorController::class, 'postPidgen']);
    Route::post('pidgen_depth', [CustomPriceGeneratorController::class, 'postPidgenDepth']);
});

Route::prefix('/dan/pool')->group(function () {
    Route::get('/', [IndexController::class, 'getIndex']);
    Route::post('/', [IndexController::class, 'postIndex']);
    Route::get('plot', [PlotController::class, 'getIndex']);
    Route::get('plot/data', [PlotController::class, 'getData']);
    Route::post('plot/data', [PlotController::class, 'postStorePlot']);
    Route::get('plot/data-get-cover', [PlotController::class, 'getCover']);
    Route::get('finish', [IndexController::class, 'getFinish']);
    Route::post('finish', [IndexController::class, 'submit']);
});

Route::post('/dan/livewire/message/{name}', 'Livewire\Controllers\HttpConnectionHandler');
