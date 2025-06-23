<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaughtCoursesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\SauPaymentController;
use App\Http\Controllers\PhdDetailsController;
use App\Http\Controllers\UploadDocumentsControllerer;
use App\Http\Middleware\CheckUserSession;



Route::get('/', function () { return view('login');})->name('home-login');
Route::get('/test', function () { return view('login_backup');})->name('login-backup');

Route::get('/SignIn', function () { return view('login');})->name('login');
Route::get('/signup', function () {return view('signup');})->name('signup');

Route::post('/submit-application-form', [SignupController::class, 'store'])->name('submit-application-form');

Route::get('otp/{id}', function () {
    return view('otp');
})->name('otp.view');




Route::middleware([CheckUserSession::class])->group(function () {

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/thanks', function () {   return view('thanks');})->name('thanks');

    Route::get('/step', [FormController::class, 'step'])->name('step');
    Route::get('/step1', [FormController::class, 'step1'])->name('step1');
    Route::get('/step3/{id}', [FormController::class, 'step3'])->name('step3');
    Route::get('/step2/{id}', [FormController::class, 'step2'])->name('step2');
    Route::get('/step4/{id}', [FormController::class, 'step4'])->name('step4');
    Route::get('/step5/{id}', [FormController::class, 'step5'])->name('step5');
    Route::get('/step6/{id}', [FormController::class, 'step6'])->name('step6');
    Route::get('/preview/{id}', [FormController::class, 'preview'])->name('preview');



    Route::get('/success', [FormController::class, 'success'])->name('success');
    Route::get('logout', [FormController::class, 'logout'])->name('logout');

    Route::post('/insertStep', [FormController::class, 'insertStep'])->name('insertStep');
    Route::post('/insertStep1', [FormController::class, 'insertStep1'])->name('insertStep1');
    Route::post('/updateStep2', [FormController::class, 'updateStep2'])->name('updateStep2');
    Route::post('/updateCareer', [FormController::class, 'updateCareer'])->name('updateCareer');
    Route::post('/updateStep3', [FormController::class, 'updateStep3'])->name('updateStep3');
    Route::post('/updateStep4', [FormController::class, 'updateStep4'])->name('updateStep4');
    Route::post('/updateStep5', [FormController::class, 'updateStep5'])->name('updateStep5');

    Route::post('/phd-details', [PhdDetailsController::class, 'store'])->name('phd-details.store');
    Route::delete('/phd-details/{id}', [PhdDetailsController::class, 'destroy'])->name('phd-details.destroy');

    Route::post('/save-course/{type}', [TaughtCoursesController::class, 'save'])->name('courses.save');
    Route::delete('/taught-courses/{id}', [TaughtCoursesController::class, 'destroy'])->name('taught-courses.destroy');

    Route::post('/document-upload', [UploadDocumentsControllerer::class, 'upload'])->name('document.upload');
    Route::post('/document-upload-pdf', [UploadDocumentsControllerer::class, 'uploadPdf'])->name('document.uploadPdf');

    Route::get('/download-application/{id}', [FormController::class, 'downloadApplicationPdf'])->name('download-application');
    Route::get('/send-application-email', [FormController::class, 'sendApplicationSubmittedEmail'])->name('send-application-email');
    Route::post('/finalSubmit', [FormController::class, 'finalSubmit'])->name('finalSubmit');
});



    Route::post('verifyOtp', [LoginController::class, 'verifyOtp'])->name('verifyOtp');
    Route::post('/checkLogin', [LoginController::class, 'checkLogin']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/coming_soon', function () {   return view('coming_soon');})->name('coming_soon');

Route::prefix('admin')->group(function () {

    Route::get('login-panel', [HomeController::class, 'login']);
    Route::post('login-panel', [HomeController::class, 'checkLogin']);
    Route::get('logout', [HomeController::class, 'logout']);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/list', [HomeController::class, 'list'])->name('list');
    Route::post('/list', [HomeController::class, 'list'])->name('admin.list');

    //   Route::get('/change-password',[HomeController::class,'changePassword'])->name('changePassword');
    Route::get('/add-change-password', [App\Http\Controllers\Admin\HomeController::class, 'addChangePassword'])->name('addChangePassword');
    //Banner
    //    Route::get('/admissions_complate_list',[AdmissionController::class,'complate_list'])->name('complate_list');
    //    Route::post('/search',[AdmissionController::class,'search'])->name('search');
    //    Route::get('/search',[AdmissionController::class,'search'])->name('search');
    //    Route::get('/admissions_in_complate_list',[AdmissionController::class,'in_complate_list'])->name('in_complate_list');
    //    Route::get('/documents/{id}',[AdmissionController::class,'documents']);
    //    Route::get('/admissionslist/add',[AdmissionController::class,'add'])->name('banner_add');
    //    Route::post('/admissionslist/create',[AdmissionController::class,'store'])->name('banner_create');
    //    Route::get('/admissionslist/edit/{id}',[AdmissionController::class,'edit'])->name('admission_edit');
    //    Route::post('/admissionslist/update/{id}',[AdmissionController::class,'update'])->name('banner_update');
    //    Route::get('/admissionslist/del/{id}',[AdmissionController::class,'destroy'])->name('banner_del');
    //    Route::get('/admissionslist/change_banner_status',[AdmissionController::class,'changeStatus'])->name('change_Admissions_status');
    //    Route::get('/reports/{master_programmes}',[AdmissionController::class,'master_programmes'])->name('master_programmes');
    //    Route::get('/phd_reports/{Phd_programmes}',[AdmissionController::class,'Phd_programmes'])->name('Phd_programmes');


    Route::get('/admp', [HomeController::class, 'admp'])->name('admp');
    Route::get('/advc', [HomeController::class, 'advc'])->name('advc');
    Route::get('/adict', [HomeController::class, 'adict'])->name('adict');
    Route::get('/adTrain', [HomeController::class, 'adTrain'])->name('adTrain');

    Route::get('/ddTrain', [HomeController::class, 'ddTrain'])->name('ddTrain');
    Route::get('/ddMedia', [HomeController::class, 'ddMedia'])->name('ddMedia');
    
    Route::get('/ddICT', [HomeController::class, 'ddICT'])->name('ddICT');
    Route::get('/ddVirCampus', [HomeController::class, 'ddVirCampus'])->name('ddVirCampus');


    Route::get('/dirICT', [HomeController::class, 'dirICT'])->name('dirICT');
    Route::get('/dirVirCampus', [HomeController::class, 'dirVirCampus'])->name('dirVirCampus');
    Route::get('/dirTrain', [HomeController::class, 'dirTrain'])->name('dirTrain');
    Route::get('/dirMedia', [HomeController::class, 'dirMedia'])->name('dirMedia');


    Route::get('/FLSBAssistant', [HomeController::class, 'FLSBAssistant'])->name('FLSBAssistant');
    Route::get('/FLSProfessor', [HomeController::class, 'FLSProfessor'])->name('FLSProfessor');
    Route::get('/FLSAssistant', [HomeController::class, 'FLSAssistant'])->name('FLSAssistant');


    Route::get('/FMCSProfessor', [HomeController::class, 'FMCSProfessor'])->name('FMCSProfessor');
    Route::get('/FMCSAssociate', [HomeController::class, 'FMCSAssociate'])->name('FMCSAssociate');
    Route::get('/FMCSAssistant', [HomeController::class, 'FMCSAssistant'])->name('FMCSAssistant');

   

    Route::get('/ManagementProfessor', [HomeController::class, 'ManagementProfessor'])->name('ManagementProfessor');
    Route::get('/ManagementAssociate', [HomeController::class, 'ManagementAssociate'])->name('ManagementAssociate');
    Route::get('/ManagementAssistant', [HomeController::class, 'ManagementAssistant'])->name('ManagementAssistant');


    Route::get('/MathematicsAssistant', [HomeController::class, 'MathematicsAssistant'])->name('MathematicsAssistant');


    Route::get('/CSEProfessor', [HomeController::class, 'CSEProfessor'])->name('CSEProfessor');
    Route::get('/CSEAssociate', [HomeController::class, 'CSEAssociate'])->name('CSEAssociate');
    Route::get('/CSEAssistant', [HomeController::class, 'CSEAssistant'])->name('CSEAssistant');


    Route::get('/dirEnglishAssistantMedia', [HomeController::class, 'EnglishAssistant'])->name('EnglishAssistant');

    Route::get('/PhysicsAssociate', [HomeController::class, 'PhysicsAssociate'])->name('PhysicsAssociate');
    Route::get('/PhysicsAssistant', [HomeController::class, 'PhysicsAssistant'])->name('PhysicsAssistant');


    Route::get('/ChemistryAssistant', [HomeController::class, 'ChemistryAssistant'])->name('ChemistryAssistant');

    Route::get('/ElectronicsEngAssistant', [HomeController::class, 'ElectronicsEngAssistant'])->name('ElectronicsEngAssistant');

    Route::get('/ClimateAssociate', [HomeController::class, 'ClimateAssociate'])->name('ClimateAssociate');
    Route::get('/ClimateAssistant', [HomeController::class, 'ClimateAssistant'])->name('ClimateAssistant');


});



Route::get('/payment', function () {
    return view('payment');
});

Route::get('/sau-generate-payment-url', [SauPaymentController::class, 'generatePaymentUrl'])->name('saugenerate.payment.url');
Route::post('sau-payment/success', [SauPaymentController::class, 'paymentResponse']); // CSRF protection for the callback URL