<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if (Schema::hasTable('permissions'))
        {
            Permission::query()->get()->map(function($permission) {
                Gate::define($permission->name, function($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        }
    }
}
