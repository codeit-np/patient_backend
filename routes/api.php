<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\HospitalsController;
use App\Http\Controllers\API\PatientsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'api'], function () {
Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'register']);
Route::post('logout', [UsersController::class, 'logout'])->middleware('auth:sanctum');
// });

Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::post('add', [UsersController::class, 'add']);
    Route::get('edit/{id}', [UsersController::class, 'edit']);
    Route::put('update/{id}', [UsersController::class, 'update']);
    Route::delete('delete/{id}', [UsersController::class, 'delete']);
    Route::get('/getHospital', [UsersController::class, 'getHospital']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
Route::resource('hospitals', HospitalsController::class);
Route::resource('patients', PatientsController::class);
// Route::delete('hospitals/delete/{id}',[HospitalsController::class,'delete']);
});