<?php

use App\Http\Controllers\Forms\ReferController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomPriceGeneratorController;
use App\Http\Controllers\PoolWizard\IndexController;
use App\Http\Controllers\PoolWizard\PlotController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\Forms\CatalogRequestController;
use App\Http\Controllers\Forms\SwimmingPoolController;
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

Route::get('/s/admin/login', function () {
    return view('auth.login');
})->name('/s/admin/login')->middleware(['guest']);

Route::post('/s/incart', [CartController::class, 'postInCart']);

Route::prefix('/s/refer')->group(function () {
    Route::get('/', [ReferController::class, 'index']);
    Route::post('/', [ReferController::class, 'submit']);
    Route::get('/success', [ReferController::class, 'success']);
});

Route::prefix('/s/tinycart')->group(function () {
    Route::get('/', [CartController::class, 'getCart']);
    Route::post('/', [CartController::class, 'postUpdate']);

    Route::get('checkout', [CheckoutController::class, 'getIndex']);
    Route::get('checkout/{id}', [CheckoutController::class, 'getStep']);
    Route::post('checkout/{id}', [CheckoutController::class, 'postStep']);

    Route::get('order/{id}', [CheckoutController::class, 'getOrder']);
});


Route::prefix('/s/pid')->group(function () {
    Route::get('/', [CustomPriceGeneratorController::class, 'getIndex']);
    Route::post('pidgen', [CustomPriceGeneratorController::class, 'postPidgen']);
    Route::post('pidgen_depth', [CustomPriceGeneratorController::class, 'postPidgenDepth']);
});

Route::prefix('/s/pool')->group(function () {
    Route::get('/', [IndexController::class, 'getIndex']);
    Route::post('/', [IndexController::class, 'postIndex']);
    Route::get('plot', [PlotController::class, 'getIndex']);
    Route::get('plot/data', [PlotController::class, 'getData']);
    Route::post('plot/data', [PlotController::class, 'postStorePlot']);
    Route::get('plot/data-get-cover', [PlotController::class, 'getCover']);
    Route::get('finish', [IndexController::class, 'getFinish']);
    Route::post('finish', [IndexController::class, 'submit']);
});

Route::post('/s/livewire/message/{name}', 'Livewire\Controllers\HttpConnectionHandler');

Route::get('/s/forms/request', [CatalogRequestController::class, 'index']);
Route::post('/s/forms/request', [CatalogRequestController::class, 'submit']);

Route::get('/s/forms/custom-swimming-pool', [SwimmingPoolController::class, 'index']);
Route::post('/s/forms/custom-swimming-pool', [SwimmingPoolController::class, 'submit']);


Route::prefix('/s/newsletters')->group(function () {
    Route::get('{post:slug}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/', [PostController::class, 'index'])->name('home');
});

Route::get('/s/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/s/sitemap-original.xml', [SitemapController::class, 'indexOriginal']);