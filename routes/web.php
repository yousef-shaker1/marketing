<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/groups',[GroupController::class,'index'])->name('all_group');
Route::get('/products',[ProductController::class,'index'])->name('all_product');
Route::get('/orders',[OrderController::class,'index'])->name('all_order');
Route::get('/order/{id}',[OrderController::class,'show_order'])->name('order');