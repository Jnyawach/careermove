<?php

use App\Http\Controllers\MpesaC2BController;
use App\Http\Livewire\CartPage;
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


Route::post('v1/cerve/callback/{id}',[MpesaC2BController::class,'callbackTrx']);
Route::post('v1/cerve/register',[CartPage::class,'mpesaRegisterUrls']);


Route::post('v1/cerve/confirm/{id}',[MpesaC2BController::class,'confirmTrx']);
Route::post('v1/cerve/validate/{id}',[MpesaC2BController::class,'validateTrx']);
Route::post('v1/cerve/accessToken',[CartPage::class,'generateAccessToken']);
Route::post('v1/cerve/stkpush',[CartPage::class,'customerMpesaSTKPush']);




