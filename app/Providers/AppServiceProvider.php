<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $roles = ['student', 'hostel_manager', 'super_admin', 'admin'];

        foreach ($roles as $role) {
            Blade::directive($role, function () use ($role) {
                return "<?php if(auth()->check() && auth()->user()->getAppRoleNames(3)->first() === '{$role}'): ?>";
            });
            
            Blade::directive("end{$role}", function () {
                return "<?php endif; ?>";
            });
        }
    }
} 
