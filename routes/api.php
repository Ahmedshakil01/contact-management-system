<?php

use App\Http\Controllers\api\v1\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->group(function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::apiResource('contacts', 'ContactController');

    Route::get('/filter/contacts', [ContactController::class,'filterContact']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
