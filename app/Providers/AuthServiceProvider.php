<?php

namespace App\Providers;

use App\Models\User;
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
        foreach (self::$permission as $feature => $roles) {
            Gate::define($feature, function (User $user) use ($roles) {
                // Permission checks
                if (in_array($user->role_id, $roles)) {
                    return true;
                }
            });
        }
    }

    /**
     * Register any permissions
     */
    // public static $permission = [
    //     'dashboard' => ["Super Admin", "Admin", "User (Student)"],
    //     'user' => ["Super Admin", "Admin"],
    //     'category' => ["Super Admin", "Admin"],
    //     'product' => ["Super Admin", "Admin"]
    // ];
    public static $permission = [
        'dashboard' => [1, 2, 3],
        'user' => [1, 2],
        'category' => [1, 2],
        'product' => [1, 2]
    ];
}
