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



//middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/buy', [BuyController::class, 'buy'])->name('buy');
    Route::post('/buy/store', [BuyController::class, 'store'])->name('buy.store');
    
    Route::get('customers', [KlantenController::class, 'index']);
    Route::get('/klanten/{id}/geschiedenis', [KlantenController::class, 'geschiedenis'])->name('klanten.geschiedenis');
    
    Route::get('/test', function () {
        return view('test');
    })->name('test');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/customers', [KlantenController::class, 'index'])->name('admin.customers');
    Route::get('/admin/customers/{id}/geschiedenis', [KlantenController::class, 'geschiedenis'])->name('admin.geschiedenis');
    Route::get('/admin/home', function () {
        return view('admin.home');
    });
});

Route::middleware(['guest'])->group(function (){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
});

//global routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('test');
    }
    return redirect()->route('login');
})->name('home');