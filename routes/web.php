<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\TenantLaporanController;
use App\Http\Controllers\TenantPemasukanController;
use App\Http\Controllers\ClientProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ClientProfileController;
use Illuminate\Support\Facades\Auth;
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

// Client-side routes
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/tentang-kami', [LandingController::class, 'about'])->name('about');

Route::get('/products', [ClientProductController::class, 'index'])->name('client.product.index');
Route::get('/products/{product}', [ClientProductController::class, 'show'])->name('client.product.show');

// Authentication routes
Auth::routes();

// Admin dashboard routes
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Tenant routes
Route::get('/tenant', [TenantController::class, 'index'])->name('tenant');

// Profile routes (Admin)
Route::middleware('admin')->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/dashboard/profiles', 'index')->name('profiles.index');
        Route::get('/dashboard/profiles/{profile}/edit', 'edit')->name('profiles.edit');
        Route::put('/dashboard/profiles/{profile}', 'update')->name('profiles.update');
    });
});

// Category routes (Admin)
Route::middleware('admin')->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/dashboard/categories', 'index')->name('categories.index');
        Route::get('/dashboard/categories/create', 'create')->name('categories.create');
        Route::post('/dashboard/categories/store', 'store')->name('categories.store');
        Route::get('/dashboard/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/dashboard/categories/{category}', 'update')->name('categories.update');
        Route::delete('/dashboard/categories/{category}', 'destroy')->name('categories.destroy');
    });
});

// Laporan routes (Admin)
Route::middleware('admin')->group(function() {
    Route::controller(LaporanController::class)->group(function() {
        Route::get('/dashboard/laporans', 'index')->name('laporans.index');
        Route::get('/dashboard/laporans/create', 'create')->name('laporans.create');
        Route::post('/dashboard/laporans/store', 'store')->name('laporans.store');
        Route::get('/dashboard/laporans/{laporan}/edit', 'edit')->name('laporans.edit');
        Route::put('/dashboard/laporans/{laporan}', 'update')->name('laporans.update');
        Route::delete('/dashboard/laporans/{laporan}', 'destroy')->name('laporans.destroy');
        Route::get('/dashboard/laporans/export', 'export')->name('laporans.export'); // Updated path
    });
});

// Pemasukan routes (Admin)
Route::middleware('admin')->group(function() {
    Route::controller(PemasukanController::class)->group(function() {
        Route::get('/dashboard/pemasukans', 'index')->name('pemasukans.index');
        Route::get('/dashboard/pemasukans/create', 'create')->name('pemasukans.create');
        Route::post('/dashboard/pemasukans/store', 'store')->name('pemasukans.store');
        Route::get('/dashboard/pemasukans/{pemasukan}/edit', 'edit')->name('pemasukans.edit');
        Route::put('/dashboard/pemasukans/{pemasukan}', 'update')->name('pemasukans.update');
        Route::delete('/dashboard/pemasukans/{pemasukan}', 'destroy')->name('pemasukans.destroy');
        Route::get('/dashboard/pemasukans/export', 'export')->name('pemasukans.export'); // Updated path
    });
});
// Laporan routes (Tenant)
Route::middleware('auth')->group(function(){
    Route::controller(TenantLaporanController::class)->group(function(){
        Route::get('/tenant/laporans', 'index')->name('tenant.laporans.index');
        Route::get('/tenant/laporans/create', 'create')->name('tenant.laporans.create');
        Route::post('/tenant/laporans/store', 'store')->name('tenant.laporans.store');
        Route::get('/tenant/laporans/{laporan}/edit', 'edit')->name('tenant.laporans.edit');
        Route::put('/tenant/laporans/{laporan}', 'update')->name('tenant.laporans.update');
        Route::delete('/tenant/laporans/{laporan}', 'destroy')->name('tenant.laporans.destroy');
        Route::get('/tenant/laporans/export', 'export')->name('laporans.export'); // Updated path

    });
});
// Laporan routes (Tenant)
Route::middleware('auth')->group(function(){
    Route::controller(TenantPemasukanController::class)->group(function(){
        Route::get('/tenant/pemasukans', 'index')->name('tenant.pemasukans.index');
        Route::get('/tenant/pemasukans/create', 'create')->name('tenant.pemasukans.create');
        Route::post('/tenant/pemasukans/store', 'store')->name('tenant.pemasukans.store');
        Route::get('/tenant/pemasukans/{laporan}/edit', 'edit')->name('tenant.pemasukans.edit');
        Route::put('/tenant/pemasukans/{laporan}', 'update')->name('tenant.pemasukans.update');
        Route::delete('/tenant/pemasukans/{laporan}', 'destroy')->name('tenant.pemasukans.destroy');
        Route::get('/tenant/pemasukans/export', 'export')->name('pemasukans.export'); // Updated path

    });
});
// Product routes (Admin)
Route::middleware('admin')->group(function(){
    Route::controller(ProductController::class)->group(function(){
        Route::get('/dashboard/products', 'index')->name('products.index');
        Route::get('/dashboard/products/create', 'create')->name('products.create');
        Route::post('/dashboard/products/store', 'store')->name('products.store');
        Route::get('/dashboard/products/{product}/edit', 'edit')->name('products.edit');
        Route::put('/dashboard/products/{product}', 'update')->name('products.update');
        Route::delete('/dashboard/products/{product}', 'destroy')->name('products.destroy');
    });
});

// Discount routes (Admin)
Route::middleware('admin')->group(function(){
    Route::controller(DiscountController::class)->group(function(){
        Route::get('/dashboard/discounts', 'index')->name('discounts.index');
        Route::get('/dashboard/discounts/create', 'create')->name('discounts.create');
        Route::post('/dashboard/discounts/store', 'store')->name('discounts.store');
        Route::get('/dashboard/discounts/{discount}/edit', 'edit')->name('discounts.edit');
        Route::put('/dashboard/discounts/{discount}', 'update')->name('discounts.update');
        Route::delete('/dashboard/discounts/{discount}', 'destroy')->name('discounts.destroy');
    });
});

// Client profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ClientProfileController::class, 'edit'])->name('clientProfile.edit');
    Route::post('/profile/edit', [ClientProfileController::class, 'update'])->name('clientProfile.update');
});