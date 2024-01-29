<?php

use App\Http\Controllers\Students\dashboard\ExamController;
use App\Http\Controllers\Students\dashboard\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


 //==============================Translate all pages============================

 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {



   //========================Dashboard=========================
   Route::get('/student/dashboard',function(){

        return view('pages.Students.dashboard');
   });
   Route::group(['namespace ' => 'Student\dashboard'], function(){
      Route::resource('student_exams',ExamController::class);
      Route::resource('student_profile',ProfileController::class);
   });
 });
