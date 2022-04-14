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
use App\Http\Controllers\General\ListingsController;
use App\Http\Controllers\General\HiringController;
use App\Http\Controllers\General\NewsLetterController;
use App\Http\Controllers\General\ReportJob;


/*Employer*/
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\EmployerCompany;
use App\Http\Controllers\Employer\EmployerCareerController;
use App\Http\Controllers\Employer\EmployerProfileController;


/*User controller*/
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\UserAccountController;
use App\Http\Controllers\Dashboard\SavedJobsController;



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
    Route::get('admin/users/employers',  [AdminUserController::class, 'adminEmployer'])->name('admin-employers');
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
    Route::post('report-job/{id}',['as'=>'report-job','uses'=>ReportJob::class]);
    Route::resource('newsletter',NewsLetterController::class);
    Route::resource('hiring',HiringController::class);
    Route::resource('listings',ListingsController::class);
    Route::resource('contact',ContactController::class);
    Route::get('employer_registration',EmployerRegister::class);

});
Route::group(['middleware'=>['auth']],function (){
    Route::get('employers/profile',['as'=>'profile.index', 'uses'=>EmployerProfileController::class]);
    Route::get('employers/careers/blocked',  [EmployerCareerController::class, 'careersBlocked'])->name('careers-blocked');
    Route::get('employers/careers/inactive',  [EmployerCareerController::class, 'careersInactive'])->name('careers-inactive');
    Route::get('employers/careers/active',  [EmployerCareerController::class, 'careersActive'])->name('careers-active');
    Route::get('employers/careers/pending',  [EmployerCareerController::class, 'careersPending'])->name('careers-pending');
    Route::resource('employers/careers',EmployerCareerController::class);
    Route::resource('employers/organizations',EmployerCompany::class);
    Route::resource('employers',EmployerController::class);

});
Route::group(['middleware'=>['auth']],function (){
    Route::resource('dashboard/saved',SavedJobsController::class);
    Route::resource('dashboard/accounts',UserAccountController::class);
    Route::resource('dashboard',UserController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
