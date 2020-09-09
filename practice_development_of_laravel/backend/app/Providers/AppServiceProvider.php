<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config([
            'sample.data' => ['hoge','fuga','piyo'],
        ]);

        // app()->bind('App\MyClasses\Myservice', function($app){
        //     $myservice = new MyService();
        //     $myservice->setId(0);
        //     return $myservice;
        // });

        app()->when('App\MyClasses\MyService')
                ->needs('$id')
                ->give(1);
    }
}
