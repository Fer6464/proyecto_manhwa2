<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ObrasController;
use App\http\Controllers\UsuariosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('manhwa', ObrasController::class);
Route::get('/user', [UsuariosController::class, 'index'])->middleware('sesion')->name('user.index');;
Route::get('/user/login', [UsuariosController::class, 'login'])->name('user.login');
Route::get('/manhwa/vistaObra', [ObrasController::class, 'viewObra'])->name('manhwa.viewObra');
Route::post('/user', [UsuariosController::class, 'store'])->name('user.store');
Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('manhwa.index'); 
})->name('logout');