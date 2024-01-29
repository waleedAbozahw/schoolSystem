<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

// ajax routes


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher,web']
    ], function () {

        Route::get('/Get_classrooms/{id}',[AjaxController::class,'Get_classrooms']);
        Route::get('/Get_Sections/{id}',[AjaxController::class,'Get_Sections']);
    });




?>
