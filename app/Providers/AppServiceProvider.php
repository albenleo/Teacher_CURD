<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Gate::define('edit-student', function (User $user, Student $student) {
        //     return $student->user_id === Auth::User()->id;
        // });
    }
}
