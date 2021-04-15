<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

Route::middleware('auth:api')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::get('/user/{id}', function ($id) {
    //     return new UserResource(User::findOrFail($id));
    // });

    Route::resource('users', UserController::class);

    // Route::get('/users', function () {
    //     return UserResource::collection(User::all());
    // });
});







