<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrdersController;

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

// Route::get('/', function () {
//     return view('/auth.login');
// });

// Route::get('/',  [App\Http\Controllers\OrdersController::class, 'index'])->name('order.form');

Auth::routes([
    'register'=>false, //registeration route
    'comfirm'=>false,   //password comfirm route
    'reset'=>false, //password reset route
    'verify'=>false,   // email verify route
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/msater', [App\Http\Controllers\HomeController::class, 'admin'])->name('layouts.master');

Route::get('/', [App\Http\Controllers\OrdersController::class, 'index'])->name('order.form');
Route::post('order_submit', [App\Http\Controllers\OrdersController::class, 'submit'])->name('order.submit');
Route::get('order/{order}/serve', [App\Http\Controllers\OrdersController::class, 'serve']);
Route::get('search', [App\Http\Controllers\OrdersController::class, 'index'])->name('order.search');



Route::get('order',[App\Http\Controllers\DishesController::class, 'order'])->name('kitchen.order');
Route::get('order/{order}/approve', [App\Http\Controllers\DishesController::class, 'approve']);
Route::get('order/{order}/cancel', [App\Http\Controllers\DishesController::class, 'cancel']);
Route::get('order/{order}/ready', [App\Http\Controllers\DishesController::class, 'ready']);


Route::resource('dish', App\Http\Controllers\DishesController::class);

Route::resource('category', App\Http\Controllers\CategoryController::class);