<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if (Schema::hasTable('users_x_roles')) {
            Blade::directive('role', function($role) {
                return "<?php if((auth()->check()) && auth()->user()->hasRole({$role})): ?>";
            });

            Blade::directive('endrole', function($role) {
                return "<?php endif; ?>";
            });
        }
    }
}
