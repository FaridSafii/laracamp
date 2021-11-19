<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;
use App\Http\Controllers\HomepageController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/',[HomepageController::class,'index'])->name('home');

//Route::get('/login', [UserController::class,'login'])->middleware('guest')->name('login');

Route::get('sign-in-google',[UserController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback',[UserController::class,'handleProviderCallback'])->name('user.login.callback');

Route::middleware(['auth'])->group(function(){
    Route::get('checkout/success', [CheckoutController::class,'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('checkout/{camp:slug}', [CheckoutController::class,'create'])->name('checkout')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp}', [CheckoutController::class,'store'])->name('checkout.store')->middleware('ensureUserRole:user');
    
    //dashboard
    Route::get('dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    //user dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/',[UserDashboard::class,'index'])->name('dashboard');
        Route::post('/profil',[UserDashboard::class,'store'])->name('profil');

    });

    //admin dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/',[AdminDashboard::class,'index'])->name('dashboard');
        Route::post('checkout/{checkout}',[AdminCheckout::class,'update'])->name('checkout.update');
    });

    //Route::get('dashboard/checkout/invoice/{checkout}',[CheckoutController::class,'invoice'])->name('user.checkout.invoice');
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
