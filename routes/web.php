<?php

use App\Http\Controllers\BuyController;
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
// Route::post('/buy/store', function() {
//     dd('het werkt');
// })->name('buy.store');

Route::get('/buy', [BuyController::class, 'buy'])->name('buy');
Route::post('/buy/store', [BuyController::class, 'store'])->name('buy.store');

Route::get('/', function () {
    return view('home');
});