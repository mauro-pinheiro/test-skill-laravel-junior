<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());
    Route::apiResource('products', ProductController::class);
    Route::apiResource('clients', ClientController::class);
    Route::delete('token', [TokenController::class, 'revoke'])->name('token.revoke');
    Route::delete('token/all', [TokenController::class, 'revokeAll'])->name('token.revoke.all');
});

Route::middleware('auth')->group(function () {
    Route::get('token', [TokenController::class, 'create'])->name('token.create');
});
