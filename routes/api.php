<?php

use App\Http\Controllers\General\RestoreCart;

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

Route::patch('/restore/{id}', ['as'=>'restorCart','uses'=>RestoreCart::class]);


Route::post('v2/access/token', [CartPage::class,'generateAccessToken']);
Route::post('v2/cerve/stk/push', [CartPage::class,'customerMpesaSTKPush']);
Route::post('v1/cerve/validation/{id}', [CartPage::class,'mpesaValidation']);
Route::post('v1/cerve/transaction/confirmation/{id}', [CartPage::class,'mpesaConfirmation']);
Route::post('v1/cerve/register/url', [CartPage::class,'mpesaRegisterUrls']);
