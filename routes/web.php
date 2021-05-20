<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Records\ProfileController;
use App\Http\Controllers\Records\UserController;
use App\Http\Controllers\Records\HomeController;

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

// Route::get('/lsyt/{any}', function () { return view('app'); })->where('any', '.*');
Route::get('/lsyt/{any}', function () { return view('apiapp'); });
// Route::get('/lsyt/users/{any}', function () { return view('apiapp'); });
// Route::get('/lsyt/hospitals/{any}', function () { return view('apiapp'); });
Route::get('/lsyt/patients-edit/{id}', function () { return view('apiapp'); });

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'records'], function () {
	Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

	Route::get('profile', [ProfileController::class,'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class,'update'])->name('profile.update');
	Route::get('profile/add', [ProfileController::class, 'add'])->name('profile.add');
	Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');

	Route::resource('users', UserController::class, ['except' => ['show']]);
	Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
	Route::put('users/{id}', [UserController::class,'update'])->name('users.update');

	
	Route::put('profile/password', [ProfileController::class,'password'])->name('profile.password');
	Route::put('users/password', [UserController::class,'password'])->name('users.password');
	
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	});
});