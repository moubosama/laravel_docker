<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Model::setConnectionResolver($this->app['db']);
        Model::setEventDispatcher($this->app['events']);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::clearBootedModels();
        $this->registerConnectionServices();
        $this->registerEloquentFactory();
        $this->registerQueueableEntityResolver();
        $this->registerDoctrineTypes();
    }

    protected function registerConnectionServices()
    {
        $this->app->singleton('db.factory', function ($app) {
            return new ConnectionFactory($app);
        });

        $this->app->singleton('db', function ($app) {
            return new DatabaseManager($app, $app['db.factory']);
        });

        $this->app->singleton('db.connection', function ($app) {
            return $app['db']->connection();
        });

        $this->app->singletl ('db.transaction', function ($app) {
            return new TransactionManager($app['db.connection']);
        });
    }

    protected function registerEloquentFactory()
    {
        $this->app->singleton(Factory::class, function () {
            return Factory::construct(
                $this->app->make(Generator::class),
                $this->app->databasePath('factories')
            );
        });
    }

    protected function registerQueueableEntityResolver()
    {
        $this->app->singleton(QueueableEntityResolver::class, function () {
            return new QueueableEntityResolver;
        });
    }
}
