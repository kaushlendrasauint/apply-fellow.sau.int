<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdmissionController;


 Route::group(["middleware"=>"AdminAuth"],function()
 {
    Route::prefix("admin")->group(function()
    {
     
      Route::get('/phd_reports/btech_reports',[AdmissionController::class,'btech_reports'])->name('btech_reports');
      Route::get('/phd_reports/mtech_reports',[AdmissionController::class,'mtech_reports'])->name('mtech_reports');

      Route::get('login-panel',[HomeController::class,'login']);
      Route::post('login-panel',[HomeController::class,'checkLogin']);
      Route::get('logout',[HomeController::class,'logout']);
      Route::get('/home',[HomeController::class,'index'])->name('home');
      Route::get('/change-password',[HomeController::class,'changePassword'])->name('changePassword');
      Route::get('/add-change-password',[App\Http\Controllers\Admin\HomeController::class,'addChangePassword'])->name('addChangePassword');
       
       //Banner

       Route::get('/admissionslist',[AdmissionController::class,'index'])->name('banner');
       Route::get('/admissions_complate_list',[AdmissionController::class,'complate_list'])->name('complate_list');
       Route::post('/search',[AdmissionController::class,'search'])->name('search');
       Route::get('/search',[AdmissionController::class,'search'])->name('search');
       Route::get('/admissions_in_complate_list',[AdmissionController::class,'in_complate_list'])->name('in_complate_list');
       Route::get('/documents/{id}',[AdmissionController::class,'documents']);              
       Route::get('/admissionslist/add',[AdmissionController::class,'add'])->name('banner_add');
       Route::post('/admissionslist/create',[AdmissionController::class,'store'])->name('banner_create');
       Route::get('/admissionslist/edit/{id}',[AdmissionController::class,'edit'])->name('admission_edit');
       Route::post('/admissionslist/update/{id}',[AdmissionController::class,'update'])->name('banner_update');
       Route::get('/admissionslist/del/{id}',[AdmissionController::class,'destroy'])->name('banner_del');
       Route::get('/admissionslist/change_banner_status',[AdmissionController::class,'changeStatus'])->name('change_Admissions_status');
       Route::get('/reports/{master_programmes}',[AdmissionController::class,'master_programmes'])->name('master_programmes');
       Route::get('/phd_reports/{Phd_programmes}',[AdmissionController::class,'Phd_programmes'])->name('Phd_programmes');

     
	   
    });
  });