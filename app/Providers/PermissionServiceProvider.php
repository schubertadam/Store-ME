<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        try {
            DB::connection()->getPdo();

            if (Schema::hasTable('permissions')) {
                Permission::query()->get()->map(function(Permission $permission) {
                    Gate::define($permission->name, function(User $user) use ($permission) {
                        return $user->hasPermissionTo($permission);
                    });
                });
            }
        } catch (\Exception $e) {

        }
    }
}
