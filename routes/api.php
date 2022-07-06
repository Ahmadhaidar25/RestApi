<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::get('read',[ApiController::class, 'index']);
Route::post('/create/data',[ApiController::class, 'create']);
Route::get('/detail/data/{id}',[ApiController::class, 'edit']);
Route::delete('/delete/data/{id}',[ApiController::class, 'show']);
Route::put('/update/data/{id}',[ApiController::class, 'update']);