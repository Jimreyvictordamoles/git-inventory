<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;

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

// Route::resource('/inventory', InventoryController::class);

Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/index/create', [InventoryController::class, 'create'])->name('inventory.create');

Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');

Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');

Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');

// category 
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

