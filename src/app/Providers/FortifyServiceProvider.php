<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

use App\Actions\Fortify\CreateNewManager;


class FortifyServiceProvider extends ServiceProvider
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
    public function boot(): void{
        Fortify::createUsersUsing(function ($request) {
            if ($request->routeIs('manager.*')) {
                return app(CreateNewManager::class)->create($request->all());
            }
            return app(CreateNewUser::class)->create($request->all());
        });
        // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        // Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::registerView(function () {
            if (request()->routeIs('manager.*')) {
                return view('auth.manager_register');
            }
            return view('auth.user_register');
        });
        
        RateLimiter::for('login',function(Request $request){
            $email = (string) $request -> email;
            return Limit::perMinute(10)->by($email.$request->ip());
        });
        
        Fortify::loginView(function () {
            if (request()->routeIs('manager.*')) {
                return view('auth.manager_login');
            }
            return view('auth.user_login');
        });

        Fortify::authenticateUsing(function ($request) {
            // 管理者ログイン
            if ($request->routeIs('manager.*')) {
                if (Auth::guard('manager')->attempt($request->only('email', 'password'))) {
                    return Auth::guard('manager')->user();
                }
                return null;
            }
            // 一般ユーザー
            if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
                return Auth::guard('web')->user();
            }
            return null;
        });

    }
}
