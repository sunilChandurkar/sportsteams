<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeamsController;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('auth/register', [AuthController::class,'register']);
Route::post('auth/login', [AuthController::class,'login']);
Route::get('auth/logout', [AuthController::class,'logout'])->middleware('auth:api');


Route::get('getFootballTeams', [TeamsController::class,'getFootballTeams'])->middleware('auth:api');
Route::get('getBasketballTeams', [TeamsController::class,'getBasketballTeams'])->middleware('auth:api');


Route::get('getFavoriteTeam', [TeamsController::class,'getFavoriteTeam'])->middleware('auth:api');
Route::post('setFavoriteTeam', [TeamsController::class,'setFavoriteTeam'])->middleware('auth:api');
