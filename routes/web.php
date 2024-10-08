<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ClientProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

// All routes untuk client side
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/tentang-kami', [LandingController::class, 'about'])->name('about');

Route::get('/products', [ClientProductController::class, 'index'])->name('client.product.index');
Route::get('/products/{product}', [ClientProductController::class, 'show'])->name('client.product.show');



Auth::routes();

// All routes untuk dashboard admin
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::controller(ProfileController::class)->group(function(){
    Route::get('/dashboard/profiles', 'index')->name('profiles.index');
    Route::get('/dashboard/profiles/{profile}/edit', 'edit')->name('profiles.edit');
    Route::put('/dashboard/profiles/{profile}', 'update')->name('profiles.update');
})->middleware('auth');

Route::controller(CategoryController::class)->group(function(){
    Route::get('/dashboard/categories', 'index')->name('categories.index');
    Route::get('/dashboard/categories/create', 'create')->name('categories.create');
    Route::post('/dashboard/categories/store', 'store')->name('categories.store');
    Route::get('/dashboard/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/dashboard/categories/{category}', 'update')->name('categories.update');
    Route::delete('/dashboard/categories/{category}/destroy', 'destroy')->name('categories.destroy');
})->middleware('admin');

Route::controller(LaporanController::class)->group(function(){
    Route::get('/dashboard/laporans', 'index')->name('laporans.index');
    Route::get('/dashboard/laporans/create', 'create')->name('laporans.create');
    Route::post('/dashboard/laporans/store', 'store')->name('laporans.store');
    Route::get('/dashboard/laporans/{laporan}/edit', 'edit')->name('laporans.edit');
    Route::put('/dashboard/laporans/{laporan}', 'update')->name('laporans.update');
    Route::delete('/dashboard/laporans/{laporan}/destroy', 'destroy')->name('laporans.destroy');
})->middleware('admin');
Route::get('laporans/export/', [LaporanController::class, 'export'])->name('laporans.export')->middleware('admin');

Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard/products', 'index')->name('products.index');
    Route::get('/dashboard/products/create', 'create')->name('products.create');
    Route::post('/dashboard/products/store', 'store')->name('products.store');
    Route::get('/dashboard/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/dashboard/products/{product}', 'update')->name('products.update');
    Route::delete('/dashboard/products/{product}/destroy', 'destroy')->name('products.destroy');
})->middleware('auth');

Route::controller(DiscountController::class)->group(function(){
    Route::get('dashboard/discounts', 'index')->name('discounts.index');
    Route::get('dashboard/discounts/create', 'create')->name('discounts.create');
    Route::post('dashboard/discounts/store', 'store')->name('discounts.store');
    Route::get('/dashboard/discounts/{discount}/edit', 'edit')->name('discounts.edit');
    Route::put('/dashboard/discounts/{discount}', 'update')->name('discounts.update');
    Route::delete('/dashboard/discounts/{discount}/destroy', 'destroy')->name('discounts.destroy');
});


Route::controller(ContactController::class)->group(function(){
    Route::get('/dashboard/contacts', 'index')->name('contacts.index');
    Route::get('dashboard/contacts/create', 'create')->name('contacts.create');
    Route::post('dashboard/contacts/store', 'store')->name('contacts.store');
    Route::get('/dashboard/contacts/{contact}/edit', 'edit')->name('contacts.edit');
    Route::put('/dashboard/contacts/{contact}', 'update')->name('contacts.update');
    Route::delete('/dashboard/contacts/{contact}/destroy', 'destroy')->name('contacts.destroy');
})->middleware('admin');


use App\Http\Controllers\AdminCommentController;

Route::middleware('admin')->group(function () {
    Route::get('/dashboard/comments', [AdminCommentController::class, 'index'])->name('comments.index');
    Route::get('/dashboard/comments/create', [AdminCommentController::class, 'create'])->name('comments.create');
    Route::post('/dashboard/comments/store', [AdminCommentController::class, 'store'])->name('comments.store');
    Route::get('/dashboard/comments/{comment}/edit', [AdminCommentController::class, 'edit'])->name('comments.edit');
    Route::put('/dashboard/comments/{comment}', [AdminCommentController::class, 'update'])->name('comments.update');
    Route::delete('/dashboard/comments/{comment}/destroy', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});

use App\Http\Controllers\ClientProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ClientProfileController::class, 'edit'])->name('clientProfile.edit');
    Route::post('/profile/edit', [ClientProfileController::class, 'update'])->name('clientProfile.update');
});
