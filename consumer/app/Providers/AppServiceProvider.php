<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $config = config('rabbitmq')['connection'];

        $this->app->bind(AMQPStreamConnection::class, function () use ($config) {
            return new AMQPStreamConnection($config['host'], $config['port'], $config['user'], $config['pass']);
        });
    }
}
