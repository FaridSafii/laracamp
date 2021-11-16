<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [UserController::class,'login'])->middleware('guest')->name('login');

Route::get('sign-in-google',[UserController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback',[UserController::class,'handleProviderCallback'])->name('user.login.callback');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout/success', [CheckoutController::class,'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class,'create'])->name('checkout');
    Route::post('checkout/{camp}', [CheckoutController::class,'store'])->name('checkout.store');
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
