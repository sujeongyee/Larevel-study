<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BikeApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/bikes', [BikeApiController::class, 'index']);
Route::post('/bikes', [BikeApiController::class, 'store']);
Route::get('/bikes/{bike}', [BikeApiController::class, 'show']);
Route::put('/bikes/{bike}', [BikeApiController::class, 'update']);
Route::delete('/bikes/{bike}', [BikeApiController::class, 'destroy']);