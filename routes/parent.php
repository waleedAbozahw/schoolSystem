<?php

use App\Http\Controllers\Parents\dashboard\ChildrenController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


 //==============================Translate all pages============================

 Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {

        //========================Dashboard=========================
        Route::get('/parent/dashboard',function(){
            $sons = Student::where('parent_id',auth()->user()->id)->get();
            return view('pages.parents.dashboard',compact('sons'));
        });

        Route::get('children',[ChildrenController::class,'index'])->name('sons_index');
        Route::get('children_results/{id}',[ChildrenController::class,'children_results'])->name('children_results');
        Route::get('children_attendance',[ChildrenController::class,'children_attendance'])->name('children_attendance');
        Route::post('children_attendance_search',[ChildrenController::class,'children_attendance_search'])->name('children_attendance_search');
        Route::get('children_fees',[ChildrenController::class,'children_fees'])->name('children_fees');
        Route::get('children_receipt/{id}',[ChildrenController::class,'children_receipt'])->name('children_receipt');
        Route::get('parent_profile',[ChildrenController::class,'parent_profile'])->name('parent_profile');
        Route::post('update_parent_profile',[ChildrenController::class,'update_parent_profile'])->name('update_parent_profile');
    });

