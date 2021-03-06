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
Route::get('/signup/{id}', function () {
    return view('user.signup');
});

Route::get('/signin', function () {
    return view('user.signin');
});

Route::get('/aboutus', [App\Http\Controllers\UserController::class, 'aboutus']);

Route::post('/signin', [App\Http\Controllers\UserController::class, 'signin']);

Route::get('/privacypolicy', [App\Http\Controllers\UserController::class, 'privacypolicy']);

Route::get('/termsconditions', [App\Http\Controllers\UserController::class, 'termsconditions']);

Route::get('/forgotpassword', [App\Http\Controllers\UserController::class, 'forgotpassword']);

Route::post('/forgotpassword', [App\Http\Controllers\UserController::class, 'forgotpassword']);

Route::post('/userregistration', [App\Http\Controllers\UserController::class, 'signupuser']);

Auth::routes();

Route::group(['prefix' => 'user',  'middleware' => ['auth','user',ClearFormSession::class]], function(){
	
	Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
	
	Route::any('/exchange', [App\Http\Controllers\UserController::class, 'exchange']);

	Route::get('/account', [App\Http\Controllers\DashboardController::class, 'account']);	
	
	Route::post('/updateprofile', [App\Http\Controllers\UserController::class, 'updateprofile']);
	
	Route::any('/profile-verification', [App\Http\Controllers\UserController::class, 'profileverification']);
	
	Route::get('/deposit/{id}', [App\Http\Controllers\UserController::class, 'deposit']);
	
	Route::get('/deposit-history', [App\Http\Controllers\UserController::class, 'deposithistory']);
	
	Route::post('/deposit', [App\Http\Controllers\UserController::class, 'deposit']);
	
	Route::get('/wallet', [App\Http\Controllers\UserController::class, 'wallet']);
	
	Route::any('/getcoinaddress', [App\Http\Controllers\UserController::class, 'getcoinaddress']);
	
	Route::post('/updatestatus', [App\Http\Controllers\UserController::class, 'updatestatus']);

	Route::get('/referrals', [App\Http\Controllers\UserController::class, 'referrals']);
	
	Route::get('/bank_details', [App\Http\Controllers\UserController::class, 'bankdetails']);
	
	Route::post('/bank_details', [App\Http\Controllers\UserController::class, 'bankdetails']);
	
	Route::get('/logout', function () {
	   Auth::logout();
	   return redirect('signin');
	});
});

Route::group(['prefix' => 'admin',  'middleware' => ['auth','admin',ClearFormSession::class]], function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home')->middleware('admin');
	Route::post('/state', [App\Http\Controllers\AdminController::class, 'state'])->middleware('admin');
	Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->middleware('admin');
	Route::get('/list-user', [App\Http\Controllers\AdminController::class, 'listuser'])->middleware('admin');
	Route::post('/updatekycstatus', [App\Http\Controllers\AdminController::class, 'updatekycstatus'])->middleware('admin');
	Route::post('/save-user', [App\Http\Controllers\AdminController::class, 'saveuser'])->middleware('admin');
	Route::get('/view-user/{id}', [App\Http\Controllers\AdminController::class, 'viewuser'])->middleware('admin');
	Route::get('/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'deleteuser'])->middleware('admin');
	Route::get('/list-deposit', [App\Http\Controllers\AdminController::class, 'listdeposit'])->middleware('admin');
	Route::post('/save-deposit', [App\Http\Controllers\AdminController::class, 'savedeposit'])->middleware('admin');
	Route::get('/view-deposit/{id}', [App\Http\Controllers\AdminController::class, 'viewdeposit'])->middleware('admin');
	Route::get('/delete-deposit/{id}', [App\Http\Controllers\AdminController::class, 'deletedeposit'])->middleware('admin');
	Route::any('/myprofile', [App\Http\Controllers\AdminController::class, 'myprofile'])->middleware('admin');
	Route::get('/listcoin', [App\Http\Controllers\CoinController::class, 'index'])->middleware('admin');
	Route::get('/edit-coin/{id}', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
	Route::any('/add-coin', [App\Http\Controllers\CoinController::class, 'savecoin'])->middleware('admin');
});


