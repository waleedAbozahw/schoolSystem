<?php

use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\Teachers\dashboard\OnlineZoomClassController;
use App\Http\Controllers\Teachers\dashboard\ProfileController;
use App\Http\Controllers\Teachers\dashboard\QuestionController;
use App\Http\Controllers\Teachers\dashboard\QuizController;
use App\Http\Controllers\Teachers\dashboard\StudentController;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

 //==============================Translate all pages============================

 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

   //========================Dashboard=========================
   Route::get('/teacher/dashboard',function(){
        // elequent way
        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('sections_id');
        $sections_count = $ids->count();
        $student_count = Student::whereIn('section_id',$ids)->count();

        // query buider way
        // $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('sections_id');
        // $sections_count = $ids->count();
        // $student_count = DB::table('students')->whereIn('section_id',$ids)->count();


        return view('pages.Teachers.dashboard.dashboard',compact('sections_count','student_count'));
   });
   Route::group(['namespace'=>'Teachers\dashboard'],function(){

        Route::get('students_teacher',[StudentController::class,'index'])->name('students_teacher');
        Route::get('sections',[StudentController::class,'sections'])->name('sections');
        Route::get('attendance_report',[StudentController::class,'attendanceReport'])->name('attendance_report');
        Route::post('attendance',[StudentController::class,'attendance'])->name('attendance');
        Route::post('attendance_search',[StudentController::class,'attendanceSearch'])->name('attendance_search');

   });
        Route::resource('quizzes',QuizController::class);
        Route::resource('teacher_questions',QuestionController::class);
        Route::resource('online_zoom_classes',OnlineZoomClassController::class);
        Route::get('profile',[ProfileController::class,'index'])->name('profile.show');
        Route::post('profile/{id}',[ProfileController::class,'update'])->name('profile.update');
        Route::get('get_questions',[QuestionController::class,'get_questions'])->name('get_questions');
        Route::get('student_quizze/{id}',[QuizController::class,'student_quizze'])->name('student_quizze');
        Route::post('repeat_quizze',[QuizController::class,'repeat_quizze'])->name('repeat_quizze');


 });
