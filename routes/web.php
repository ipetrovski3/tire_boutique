<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PatternsController;
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
Route::post('/search', [PublicController::class, 'search'])->name('search.results');
Route::post('/filter', [PublicController::class, 'filter'])->name('filter.results');
Route::get('/brands/{brand}/tires/{id}', [PublicController::class, 'show_tire'])->name('show_tire');
Route::post('/add_to_cart', [PublicController::class, 'add_to_cart'])->name('add_to_cart');

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
        Route::post('remove-article', [InvoicesController::class, 'remove_article'])->name('remove.article');
        Route::post('/select-company', [InvoicesController::class, 'select_company'])->name('select.company');
        Route::post('/select-product', [InvoicesController::class, 'select_product'])->name('select.product');
        Route::post('/invoiced-product', [InvoicesController::class, 'invoiced_product'])->name('invoiced.product');

    });

    Route::prefix('patterns')->group(function() {
        Route::get('/create', [PatternsController::class, 'create'])->name('create.pattern');
        Route::post('/store', [PatternsController::class, 'store'])->name('store.pattern');
    });
});
