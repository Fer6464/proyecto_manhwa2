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

// ------------------ OBRAS (MANHWAS) ------------------
Route::prefix('manhwa')->name('manhwa.')->group(function () {
    Route::get('/', [ObrasController::class, 'index'])->name('index');
    Route::get('/create', [ObrasController::class, 'create'])->middleware('sesion')->name('create');
    Route::post('/', [ObrasController::class, 'store'])->name('store');

    Route::get('{id}/edit', [ObrasController::class, 'edit'])->middleware('sesion')->name('edit');
    Route::put('{id}', [ObrasController::class, 'update'])->name('update');

    Route::get('{id}/capitulos/create', [ObrasController::class, 'createChapter'])->middleware('sesion')->name('createChapter');
    Route::post('{id}/capitulos', [ObrasController::class, 'storeChapter'])->name('storeChapter');

    Route::get('/search', [ObrasController::class, 'search'])->name('search');
    Route::get('{id}', [ObrasController::class, 'show'])->name('show');
    Route::get('/capitulos/{id}/ver', [ObrasController::class, 'viewChapter'])->name('chapterview');

    Route::delete('/capitulos/{id}', [ObrasController::class, 'destroyChapter'])->name('destroyChapter'); 
    Route::delete('{id}', [ObrasController::class, 'destroy'])->name('destroy');
});

// ------------------ USER ------------------
Route::get('/user', [UsuariosController::class, 'index'])->middleware('sesion')->name('user.index');;

Route::get('/user/login', [UsuariosController::class, 'login'])->name('user.login');
Route::post('/user', [UsuariosController::class, 'sesionstore'])->name('user.sesionstore');

Route::get('/user/crear', [UsuariosController::class, 'create'])->name('user.create');
Route::post('/user/store', [UsuariosController::class, 'store'])->name('user.store');

Route::get('/user/{id}/edit', [UsuariosController::class, 'edit'])->middleware('sesion')->name('user.edit');;
Route::put('/user/{id}', [UsuariosController::class, 'update'])->name('user.update');

Route::delete('user/{id}', [UsuariosController::class, 'destroy'])->name('user.destroy');

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('manhwa.index'); 
})->name('logout');