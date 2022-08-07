<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
use App\Http\Controllers\Admin\AdminreportJobcontroller;
use App\Http\Controllers\Admin\AdminSubscription;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminAdsController;
use App\Http\Controllers\Admin\DisableAds;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminTestimonyController;
use App\Http\Controllers\Admin\AdminMpesaController;
use App\Http\Controllers\Admin\AdminTemplateController;



/*General*/
use App\Http\Controllers\General\ContactController;
use App\Http\Controllers\General\EmployerRegister;
use App\Http\Controllers\General\ListingsController;
use App\Http\Controllers\General\HiringController;
use App\Http\Controllers\General\NewsLetterController;
use App\Http\Controllers\General\ReportJob;
use App\Http\Controllers\General\BlogController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\General\SearchController;
use \App\Http\Controllers\General\CartController;
use \App\Http\Controllers\General\OrderTracker;
use \App\Http\Controllers\General\RatingController;
use \App\Http\Controllers\General\ServiceController;
use \App\Http\Controllers\General\ResumeBuilder;
use \App\Http\Controllers\General\ResumeTemplates;



/*Employer*/
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employer\EmployerCompany;
use App\Http\Controllers\Employer\EmployerCareerController;
use App\Http\Controllers\Employer\EmployerProfileController;


/*User controller*/
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\UserAccountController;
use App\Http\Controllers\Dashboard\SavedJobsController;
use App\Http\Controllers\Dashboard\CareerSummary;
use App\Http\Controllers\Dashboard\EducationController;
use App\Http\Controllers\Dashboard\WorkController;
use App\Http\Controllers\Dashboard\SkillsController;
use App\Http\Controllers\Dashboard\HobbyController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\AwardsController;
use App\Http\Controllers\Dashboard\AssociationController;
use App\Http\Controllers\Dashboard\ReferenceController;
use App\Http\Controllers\Dashboard\UserResumeBuilder;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Dashboard\HardSkillsController;
use App\Http\Controllers\Dashboard\SavedResumes;
use App\Http\Controllers\General\RestoreCart;

Route::group(['middleware'=>['auth','role:super-admin|Manager','verified']],function (){
    Route::patch('ads-disable/{id}',  ['as'=>'ads-disable', 'uses'=>DisableAds::class]);
    Route::patch('testimony-status/{id}',  [AdminTestimonyController::class, 'testimony'])->name('testimony-status');
    Route::get('admin/orders/order-status/{id}',  [AdminOrderController::class, 'orderStatus'])->name('order-status');
    Route::resource('admin/cv_templates',AdminTemplateController::class);
    Route::resource('admin/payments',AdminMpesaController::class);
    Route::resource('admin/testimony',AdminTestimonyController::class);
    Route::resource('admin/orders',AdminOrderController::class);
    Route::resource('admin/products',AdminProductController::class);
    Route::resource('admin/adverts',AdminAdsController::class);
    Route::resource('admin/posts',AdminPostController::class);
    Route::resource('admin/authors',AdminAuthorController::class);
    Route::resource('admin/subscribers',AdminSubscription::class);
    Route::resource('admin/report',AdminreportJobcontroller::class);
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
    Route::resource('admin/roles',AdminRoleController::class,['middleware' => 'role:super-admin']);
    Route::resource('admin',AdminController::class);
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
});

Route::group([],function (){
    Route::get('templates/{id}',  [HomeController::class, 'resume'])->name('resume');
    Route::get('confirmation',  [HomeController::class, 'confirmation'])->name('confirmation');
    Route::get('thank-you',  [HomeController::class, 'thank'])->name('thank-you');
    Route::get('about',  [HomeController::class, 'about'])->name('about');
    Route::get('terms',  [HomeController::class, 'terms'])->name('terms');
    Route::get('privacy-policy',  [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('professional-resume',  [HomeController::class, 'professionaResume'])->name('professional-resume');
    Route::post('report-job/{id}',['as'=>'report-job','uses'=>ReportJob::class]);
    Route::resource('resume-template',ResumeTemplates::class);
    Route::resource('newsletter',NewsLetterController::class);
    Route::resource('cart',CartController::class);
    Route::resource('rating',RatingController::class);
    Route::resource('tracker',OrderTracker::class);
    Route::resource('search',SearchController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('hiring',HiringController::class);
    Route::resource('listings',ListingsController::class);
    Route::resource('contact',ContactController::class);
    Route::resource('services',ServiceController::class);
    Route::get('employer_registration',EmployerRegister::class);

});
Route::group(['middleware'=>['auth','role:super-admin|Employer','verified']],function (){
    Route::get('employers/profile',['as'=>'profile.index', 'uses'=>EmployerProfileController::class]);
    Route::get('employers/careers/blocked',  [EmployerCareerController::class, 'careersBlocked'])->name('careers-blocked');
    Route::get('employers/careers/inactive',  [EmployerCareerController::class, 'careersInactive'])->name('careers-inactive');
    Route::get('employers/careers/active',  [EmployerCareerController::class, 'careersActive'])->name('careers-active');
    Route::get('employers/careers/pending',  [EmployerCareerController::class, 'careersPending'])->name('careers-pending');
    Route::resource('employers/careers',EmployerCareerController::class);
    Route::resource('employers/organizations',EmployerCompany::class);
    Route::resource('employers',EmployerController::class);

});
Route::group(['middleware'=>['auth','role:super-admin|User','verified']],function (){
    Route::resource('dashboard/saved-resumes',SavedResumes::class);
    Route::resource('dashboard/hard-skills',HardSkillsController::class);
    Route::resource('dashboard/social-media',SocialMediaController::class);
    Route::get('dashboard/resume-builder/app/{id}', [UserResumeBuilder::class,'resumeApp'])->name('resume-app');
    Route::resource('dashboard/resume-builder',UserResumeBuilder::class);
    Route::resource('dashboard/associations',AssociationController::class);
    Route::resource('dashboard/awards',AwardsController::class);
    Route::resource('dashboard/references',ReferenceController::class);
    Route::resource('dashboard/skills',SkillsController::class);
    Route::resource('dashboard/languages',LanguageController::class);
    Route::resource('dashboard/hobbies',HobbyController::class);
    Route::resource('dashboard/summary',CareerSummary::class);
    Route::resource('dashboard/saved',SavedJobsController::class);
    Route::resource('dashboard/education',EducationController::class);
    Route::resource('dashboard/accounts',UserAccountController::class);
    Route::resource('dashboard/work',WorkController::class);
    Route::resource('dashboard',UserController::class);
});

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
