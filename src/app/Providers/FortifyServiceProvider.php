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
        // 一般ユーザー登録
        Fortify::createUsersUsing(CreateNewUser::class);
        // 一般ユーザーの登録画面
        Fortify::registerView(function () {
            return view('auth.user_register');
        });
        // ログイン試行回数制限
        RateLimiter::for('login',function(Request $request){
            $email = (string) $request -> email;
            return Limit::perMinute(10)->by($email.$request->ip());
        });
        // ログイン画面の切り替え（一般・管理者）
        Fortify::loginView(function () {
            if (request()->routeIs('manager.*')) {
                return view('auth.manager_login');
            }
            return view('auth.user_login');
        });
        // ログイン処理の切り替え（一般・管理者）
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
