<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/', [ApiController::class, 'index'])->name('home.login');
Route::get('/home', [ApiController::class, 'home'])->name('home');

Route::get('/getWisata', [ApiController::class, 'apigetWisata'])->name('wisata.index');
Route::prefix('wisata')->group(function () {
    Route::get('/tambah', [ApiController::class, 'tambahWisata'])->name('wisata.create');
    Route::post('/addWisata', [ApiController::class, 'apiAddWisata'])->name('wisata.store');
    Route::prefix('{id}')->group(function () {
        Route::get('/', [ApiController::class, 'apiDetailWisata'])->name('wisata.detail');
        Route::get('/edit', [ApiController::class, 'editWisata'])->name('wisata.edit');
        Route::post('/updateWisata', [ApiController::class, 'apiUpdateWisata'])->name('wisata.update');
        Route::get('delete', [ApiController::class, 'apiDeleteWisata'])->name('wisata.delete');
    });
});
Route::post('/login', [ApiController::class, 'apiLogin'])->name('login');
Route::get('/logout', [ApiController::class, 'apiLogout'])->name('logout');
