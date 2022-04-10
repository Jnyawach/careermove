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
use App\Http\Controllers\Admin\AdminPolicyController;
use App\Http\Controllers\Admin\AdminJobsController;

/*General*/
use App\Http\Controllers\General\ContactController;
use App\Http\Controllers\General\EmployerRegister;


Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']],function (){
    Route::get('admin/jobs/pending',  [AdminJobsController::class, 'jobsPending'])->name('jobs-pending');
    Route::get('admin/jobs/active',  [AdminJobsController::class, 'jobsActive'])->name('jobs-active');
    Route::get('admin/jobs/disabled',  [AdminJobsController::class, 'jobsDisabled'])->name('jobs-disabled');
    Route::get('admin/jobs/blocked',  [AdminJobsController::class, 'jobsBlocked'])->name('jobs-blocked');
    Route::get('admin/jobs/inactive',  [AdminJobsController::class, 'jobsInactive'])->name('jobs-inactive');
    Route::resource('admin/jobs',AdminJobsController::class);
    Route::resource('admin/policies',AdminPolicyController::class);
    Route::resource('admin/companies',AdminCompanyController::class);
    Route::resource('admin/messages',AdminMessageController::class);
    Route::get('admin/users/employer',  [AdminUserController::class, 'adminEmployer'])->name('admin-employer');
    Route::get('admin/users/jobseeker',  [AdminUserController::class, 'adminJobseeker'])->name('admin-jobseeker');
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
    Route::get('employer_registration',EmployerRegister::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
