<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Quizzes\QuestionController;
use App\Http\Controllers\Quizzes\QuizController;
use App\Http\Controllers\Sections\SectionsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\GraduationController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\OnlineClassController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProccessingFeesController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptStudentController;
use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Livewire\AddParent;
use App\Livewire\Counter;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Controllers\HttpConnectionHandler;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Auth::routes();

   Route::get('/',[HomeController::class,'index'])->name('selection');

   Route::group(['namespace'=>'Auth'],function(){
      Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');

      Route::post('/login',[LoginController::class,'login'])->name('login');

      Route::get('/logout/{type}',[LoginController::class,'logout'])->name('logout');
   });



     //==============================Translate all pages============================
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
        ], function () {



       //========================Dashboard=========================
       Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    //    Route::group(['namespace' => 'Grades'],function(){

    //         Route::resource('grades',GradeController::class);
    //    });
    //========================Grades=========================
    Route::resource('Grades',GradeController::class);
    //========================Classrooms=========================
    Route::resource('Classrooms',ClassroomController::class);

    Route::post('delete_all',[ClassroomController::class,'delete_all'])->name('delete_all');

    Route::post('Filter_Classes',[ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');

    //=======================Sections=============================

    Route::resource('Sections',SectionsController::class);

    Route::get('/classes/{id}',[SectionsController::class,'getclasses']);

//=======================Parents=============================

Route::view('add_parent','livewire.show_Form')->name('add_parent');
//======================Teachers================
Route::resource('Teachers',TeacherController::class);

//======================Students================
Route::resource('Students',StudentsController::class);
Route::resource('online_classes',OnlineClassController::class);
// to access offline with zoom
Route::get('/indirect',[OnlineClassController::class,'indirectCreate'])->name('indirectCreate');
Route::post('/indirect',[OnlineClassController::class,'storeIndirect'])->name('indirect.store');

//-------------------------------------------------------------------

// Route::get('/Get_classrooms/{id}',[StudentsController::class,'Get_classrooms']);
// Route::get('/Get_Sections/{id}',[StudentsController::class,'Get_Sections']);
Route::post('Upload_Attachment',[StudentsController::class,'Upload_Attachment'])->name('Upload_Attachment');
Route::get('Download_attachment/{studentsname}/{filename}',[StudentsController::class,'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment',[StudentsController::class,'Delete_attachment'])->name('Delete_attachment');
//----------------------student promotion-------------------
Route::resource('Promotion',PromotionController::class);
//----------------------student graduation-------------------
Route::resource('Graduation',GraduationController::class);
//-----------------------fees---------------------
Route::resource('Fees',FeesController::class);
Route::resource('FeesInvoices',FeesInvoicesController::class);

Route::resource('receipt_students',ReceiptStudentController::class);
Route::resource('ProcessingFees',ProccessingFeesController::class);
Route::resource('Payment_students',PaymentController::class);
Route::resource('Attendance',AttendanceController::class);

//=========================Subjects====================================
Route::resource('subjects',SubjectController::class);

//=========================Quizzes====================================
Route::resource('Quizzes',QuizController::class);

//=========================Questions====================================
Route::resource('questions',QuestionController::class);

// =================Library==================
Route::resource('library',LibraryController::class);

Route::get('download_file/{filename}',[LibraryController::class,'downloadAttachment'])->name('downloadAttachment');

//====================Settings============================
Route::resource('settings',SettingController::class);

// كود اضافة حقل بعد انشاء الجدول
// php artisan make:migration add_votes_to_tablename_table --table:tablename


});


















