<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositary\TeacherRepositaryInterface',
            'App\Repositary\TeacherRepositary',
        );
        $this->app->bind(
            'App\Repositary\StudentRepositaryInterface',
            'App\Repositary\StudentRepositary',
        );
        $this->app->bind(
            'App\Repositary\StudentPromotionInterface',
            'App\Repositary\StudentPromotion',
        );
        $this->app->bind(
            'App\Repositary\StudentGraduationInterface',
            'App\Repositary\StudentGraduation',
        );
        $this->app->bind(
            'App\Repositary\FeesInterface',
            'App\Repositary\FeesRepositary',
        );
        $this->app->bind(
            'App\Repositary\FeeInvoicesInterface',
            'App\Repositary\FeeInvoicesRepository',
        );
        $this->app->bind(
            'App\Repositary\ReceiptStudentInterface',
            'App\Repositary\ReceiptStudent',
        );
        $this->app->bind(
            'App\Repositary\ProccessingFeesInterface',
            'App\Repositary\ProccessingFees',
        );
        $this->app->bind(
            'App\Repositary\PaymentRepositaryInterface',
            'App\Repositary\PaymentRepositary',
        );
        $this->app->bind(
            'App\Repositary\AttendanceRepositaryInterface',
            'App\Repositary\AttendanceRepositary',
        );
        $this->app->bind(
            'App\Repositary\SubjectRepositaryInterface',
            'App\Repositary\SubjectRepositary',
        );
        $this->app->bind(
            'App\Repositary\QuizRepositaryInterface',
            'App\Repositary\QuizRepositary',
        );
        $this->app->bind(
            'App\Repositary\QuestionRepositaryInterface',
            'App\Repositary\QuestionRepositary',
        );
        $this->app->bind(
            'App\Repositary\LibraryRepositaryInterface',
            'App\Repositary\LibraryRepositary',
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
