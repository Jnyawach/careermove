<?php

use Illuminate\Support\Facades\Route;
/*Admin Routes*/
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminProfessionController;
use App\Http\Controllers\Admin\AdminIndustryController;
use App\Http\Controllers\Admin\AdminExperienceController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminCompanyController;

/*General*/
use App\Http\Controllers\General\ContactController;


Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']],function (){
    Route::resource('admin/companies',AdminCompanyController::class);
    Route::resource('admin/messages',AdminMessageController::class);
    Route::resource('admin/users',AdminUserController::class);
    Route::resource('admin/location',AdminLocationController::class);
    Route::resource('admin/experience',AdminExperienceController::class);
    Route::resource('admin/industry',AdminIndustryController::class);
    Route::resource('admin/profession',AdminProfessionController::class);
    Route::resource('admin/roles',AdminRoleController::class);
    Route::resource('admin',AdminController::class);
});

Route::group([],function (){
    Route::resource('contact',ContactController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
