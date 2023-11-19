<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('student', function($user){
            if(auth()->user()->role->title == 'Student'){
                return true;
            }
            return false;
        });

        Gate::define('faculty', function($user){
            if(auth()->user()->role->title == 'Faculty'){
                return true;
            }
            return false;
        });

        Gate::define('staff', function($user){
            if(auth()->user()->role->title == 'Staff'){
                return true;
            }
            return false;
        });
        
        Gate::define('nurse', function($user){
            if(auth()->user()->role->title == 'Nurse'){
                return true;
            }
            return false;
        });

        Gate::define('doctor', function($user){
            if(auth()->user()->role->title == 'Doctor'){
                return true;
            }
            return false;
        });

        Gate::define('dentist', function($user){
            if(auth()->user()->role->title == 'Dentist'){
                return true;
            }
            return false;
        });

        Gate::define('admin', function($user){
            if(auth()->user()->role->title == 'Admin'){
                return true;
            }
            return false;
        });
    }
}
