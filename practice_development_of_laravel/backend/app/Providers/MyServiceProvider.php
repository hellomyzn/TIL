<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
        echo "MyServiceProvider/register<br>";
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        echo "<p>MyServiceProvider/boot</p><br>";
        echo "fuga";
    }
}
