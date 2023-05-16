<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});

Route::get('/login', function (Request $request) {
    if(Auth::check())
    {
        return redirect('valaszto');
    }

    if(Session::get('hibakod') == 1 || Session::get('hibakod') == 2)
    {
        return view('bejelentkezes', ['hibakod' => 1]);
    }
    elseif (Session::get('hibakod') == 3) {

        return view('bejelentkezes', ['hibakod' => 2]);
    }
    else {
        return view('bejelentkezes', ['hibakod' => 0]);
    }
})->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get("/valaszto", [App\Http\Controllers\RedirectController::class, "valaszto"]);
    Route::get('/vasarlofelulet' ,function () {
        return view('vasarlofelulet');
    });
    Route::get('/ettermifelulet' ,function () {
        return view('ettermifelulet');
    });
    Route::get('/futarfelulet' ,function () {
        return view('futarfelulet');
    });

    Route::get("/logout", [App\Http\Controllers\LogoutController::class, "logout"]);




});

Route::post('/bejelentkezesellenorzes', [\App\Http\Controllers\FelhasznalosController::class, 'authenticate']);
