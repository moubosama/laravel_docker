<?php

namespace Illuminate\Cache;

use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app()->singleton('cache', function ($app) {
            return new CacheManager($app);
        });

        $this->app()->singleton('cache.store', function ($app) {
            return $app['cache']->store();
        });

        $this->app()->singleton('cache.psr6', function ($app) {
            return new Psr6Store($app['cache.store']);
        });

        $this->app()->singleton('cache.psr16', function ($app) {
            return new Psr16Store($app['cache.store']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return ['cache', 'cache.store', 'cache.psr6', 'memccache.connector',
                'cache.dynamodb.client', RateLimiter::class
            ];
    }
}
