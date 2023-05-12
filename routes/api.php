<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CheckController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::apiResources([
    'cards' => CardController::class,
]);

Route::apiResources([
    'checks' => CheckController::class,
]);
*/

Route::get('v1/cards/{id}', [CardController::class, 'getCard']);
Route::post('v1/cards', [CardController::class, 'createCard']);
Route::delete('v1/cards/{id}', [CardController::class, 'deleteCard']);
Route::put('v1/cards/{id}', [CardController::class, 'putCard']);
Route::patch('v1/cards/{id}', [CardController::class, 'patchCard']);

Route::get('v1/checks/{id}', [CheckController::class, 'getCheck']);
Route::post('v1/checks', [CheckController::class, 'createCheck']);
Route::delete('v1/checks/{id}', [CheckController::class, 'deleteCheck']);
Route::put('v1/checks/{id}', [CheckController::class, 'putCheck']);
Route::patch('v1/checks/{id}', [CheckController::class, 'patchCheck']);
