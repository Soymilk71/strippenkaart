<?php

use App\Models\KlantenController;
use Illuminate\Support\Facades\Route;

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

//Buy routes

Route::get('/buy', [KlantenController::class, 'buy'])->name('buy');


Route::get('/', function () {
    return view('home');
});