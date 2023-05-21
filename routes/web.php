<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified','user'])->name('dashboard');

Route::get('/tulaj-dashboard', function () {
    return view('tulaj-dashboard');
})->middleware(['auth', 'verified','tulaj'])->name('tulaj-dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->middleware(['auth', 'verified','admin'])->name('admin-dashboard');

Route::get('/futar-dashboard', function () {
    return view('futar-dashboard');
})->middleware(['auth', 'verified','futar'])->name('futar-dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/tulaj-dashboard", [App\Http\Controllers\EtteremsController::class, "postcreate"]);
Route::post('/tulaj-dashboard', [App\Http\Controllers\EtteremsController::class, "store"]);

require __DIR__.'/auth.php';
