<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StocksController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('stock')->group(function(){
    Route::get('stock/show', [StocksController::class, 'show']);
});
