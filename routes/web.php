<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendelesController;
use App\Http\Controllers\RendelestetelController;
use App\Http\Controllers\EtelController;
use App\Http\Controllers\KosarController;

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
    return view('auth.login');
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


    Route::delete('/etels/{etel}',[EtelController::class, 'destroy']);
    Route::get('/etels', [EtelController::class,'index']);
    Route::get('/etels/{etel}/edit',[EtelController::class, 'edit']);
    Route::put('/etels/{etel}',[EtelController::class, 'update']);
    Route::get('/etels/create',[EtelController::class, 'create']);
    Route::post('/etels',[EtelController::class, 'store']);
    Route::get('/etels/{etel}',[EtelController::class, 'show']);


    Route::get('/rendeleslista', [RendelesController::class,'index']);
    Route::post('/rendeleses',[RendelesController::class, 'store']);

    Route::delete('/rendelestetellista/{rendelestetel}',[RendelestetelController::class, 'destroy']);
    Route::get('/rendelestetellista/{rendelestetel}', [RendelestetelController::class,'index']);
    Route::post('/rendelestetellista',[RendelestetelController::class, 'store']);

    Route::get('/kosar', [KosarController::class,'index']);
});


require __DIR__.'/auth.php';
