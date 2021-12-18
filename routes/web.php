<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TiresController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
| Web Routes
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', [PublicController::class, 'index'])->name('homepage');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('tires')->group(function(){
        Route::get('/', [TiresController::class, 'index'])->name('tires.index');
        Route::get('/new', [TiresController::class, 'new'])->name('tires.new');
        Route::post('/store', [TiresController::class, 'store'])->name('tires.store');
        Route::post('get-season', [TiresController::class, 'get_season'])->name('get_season');
    });

    Route::prefix('invoices')->group(function() {
        Route::get('/new', [InvoicesController::class, 'new'])->name('invoices.new');
        Route::post('/store', [InvoicesController::class, 'store'])->name('invoices.store');
    });
});
