<?php


use App\Http\Controllers\Payment\MpesaController;
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



Route::post('/callback', [MpesaController::class,'mpesaConfirmation']);
Route::post('v2/access/token', [MpesaController::class,'generateAccessToken']);
Route::post('v2/cerve/stk/push', [MpesaController::class,'customerMpesaSTKPush'])->name('lipa');


Route::post('cerve/puodhi/{id}', [MpesaController::class,'mpesaValidation']);
Route::post('cerve/yiego/{id}', [MpesaController::class,'mpesaConfirmation']);
Route::post('cerve/register/url', [MpesaController::class,'mpesaRegisterUrls']);
