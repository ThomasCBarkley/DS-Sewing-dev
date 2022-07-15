<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/', function (Request $request) {
    return $request->user();
});

//Route::get('dashboard', 'ShowDashboard')->name('dashboard');
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::resource('posts', App\Http\Controllers\Admin\PostController::class);

Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);

Route::get('updateitems', [App\Http\Controllers\Admin\UpdateItemsFromFile::class, 'index'])->name('updateitems');
Route::get('updateitems/getline', [App\Http\Controllers\Admin\UpdateItemsFromFile::class, 'getLine']);
Route::put('updateitems/storeline', [App\Http\Controllers\Admin\UpdateItemsFromFile::class, 'storeLine']);