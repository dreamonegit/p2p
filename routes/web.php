<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ClearFormSession;
use App\Http\Controllers\DashboardController;

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

Route::get('/adminlogin', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('user.index');
});

Route::get('/signup', function () {
    return view('user.signup');
});


Route::get('/signin', function () {
    return view('user.signin');
});

Route::post('/signin', [App\Http\Controllers\UserController::class, 'signin']);

Route::get('/privacypolicy', [App\Http\Controllers\UserController::class, 'privacypolicy']);

Route::get('/termsconditions', [App\Http\Controllers\UserController::class, 'termsconditions']);

Route::get('/forgotpassword', [App\Http\Controllers\UserController::class, 'forgotpassword']);

Route::post('/forgotpassword', [App\Http\Controllers\UserController::class, 'forgotpassword']);

Route::post('/userregistration', [App\Http\Controllers\UserController::class, 'signupuser']);

Route::any('/exchange', [App\Http\Controllers\UserController::class, 'exchange']);

Auth::routes();

Route::group(['prefix' => 'user',  'middleware' => ['auth','user',ClearFormSession::class]], function(){
	
	Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

	Route::get('/account', [App\Http\Controllers\DashboardController::class, 'account']);	
	
	Route::post('/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile']);
	
	Route::any('/profile-verification', [App\Http\Controllers\UserController::class, 'profileverification']);
	
	Route::get('/deposit/{id}', [App\Http\Controllers\UserController::class, 'deposit']);
	
	Route::post('/deposit', [App\Http\Controllers\UserController::class, 'deposit']);
	
	Route::any('/getcoinaddress', [App\Http\Controllers\UserController::class, 'getcoinaddress']);
	
	Route::get('/logout', function () {
	   Auth::logout();
	   return redirect('signin');
	});
});

Route::group(['prefix' => 'admin',  'middleware' => ['auth','admin',ClearFormSession::class]], function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('admin');
	Route::post('/state', [App\Http\Controllers\AdminController::class, 'state'])->middleware('admin');
	Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->middleware('admin');
	Route::any('/myprofile', [App\Http\Controllers\AdminController::class, 'myprofile'])->middleware('admin');
	Route::get('/listcoin', [App\Http\Controllers\CoinController::class, 'index'])->middleware('admin');
	Route::get('/edit-coin/{id}', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
	Route::any('/add-coin', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
});


