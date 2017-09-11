<?php

namespace Lara\Providers;

use Illuminate\Support\ServiceProvider;
use Pusher\Pusher;

class NotificationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pusher::class, function ($app) {
            return new Pusher(env('PUSHER_APP_ID'),env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'), ['cluster' => 'us2', 'encrypted' => true]);
        });
    }
}
