<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::post('/order', [OrderController::class, 'order']);
Route::get('/orders', [OrderController::class, 'orders']);
