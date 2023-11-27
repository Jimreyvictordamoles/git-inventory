<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/inventory', InventoryController::class);

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/index/create', [InventoryController::class, 'create'])->name('inventory.create');

Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');

Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');

Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');