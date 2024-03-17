<?php

namespace Tutunium;

use Illuminate\Support\ServiceProvider;

class TutuniumServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web/web.php');
        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ]);
        $this->loadViewsFrom(__DIR__.'/resources/views', 'tutunium');
    }

    public function register()
    {

    }
}
