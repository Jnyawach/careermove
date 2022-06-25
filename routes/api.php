<?php

use App\Http\Controllers\General\RestoreCart;
use App\Http\Controllers\Payment\MpesaValidation;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::patch('/restore/{id}', ['as'=>'restorCart','uses'=>RestoreCart::class]);

Route::post('validation',[MpesaValidation::class,'validation']);
Route::post('confirmation',[MpesaValidation::class,'confirmation']);

