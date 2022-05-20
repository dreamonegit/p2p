<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ClearFormSession;

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
    return view('auth.login');
});

Auth::routes();
Route::group(['prefix' => 'admin',  'middleware' => ['auth','admin',ClearFormSession::class]], function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('admin');
	Route::post('/state', [App\Http\Controllers\AdminController::class, 'state'])->middleware('admin');
	Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->middleware('admin');
	Route::any('/myprofile', [App\Http\Controllers\AdminController::class, 'myprofile'])->middleware('admin');
	Route::get('/listcoin', [App\Http\Controllers\CoinController::class, 'index'])->middleware('admin');
	Route::get('/edit-coin/{id}', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
	Route::any('/add-coin', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
});