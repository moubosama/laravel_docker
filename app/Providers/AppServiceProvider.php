<?php

// app/Providers/AppServiceProvider.php
namespace App\Providers;

use App\Contracts\WeaponServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\WeaponService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(WeaponServiceInterface::class, WeaponService::class);
    }

    public function boot()
    {
        //
    }
}
