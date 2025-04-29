<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlantenController;

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

Route::get('customers', [KlantenController::class, 'index']);
Route::get('/klanten/{id}/geschiedenis', [KlantenController::class, 'geschiedenis'])
     ->name('klanten.geschiedenis');


//auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

//middleware
Route::middleware('auth')->group(function () {
    Route::get('/authenticated/authTest', function (){
        return view ('authenticated.authTest');
      })->name('authenticated.authTest');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/', function () {
    return view('home');
});