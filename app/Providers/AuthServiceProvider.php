<?php

namespace App\Providers;

use App\Data\Models\Transient;
use App\Data\Models\User;
use Awok\Authorization\Authorization;
use Awok\Authorization\Exceptions\UnauthorizedAccess;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('authorization', function ($app) {
            return new Authorization($app);
        });
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            /**
             * @var \Awok\Foundation\Http\Request $request
             */
            if ($request->hasHeader('Authorization')) {
                $transientToken = Transient::where(
                    [
                        'type' => 'login_token',
                        'value' => $request->header('Authorization'),
                    ]
                )->first();
                if ($transientToken && $transientToken->expires_at > Carbon::now()->toDateTimeString()) {
                    return User::find($transientToken->key);
                } else {
                    throw new UnauthorizedAccess('Invalid Authorization token were sent');
                }
            }
        });
    }
}
