<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MyClasses\MyService;
use App\MyClasses\PowerMyService;

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

        // app()->when('App\MyClasses\MyService')
        //         ->needs('$id')
        //         ->give(1);

        // app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');

        app()->resolving(function ($obj, $app){
            if (is_object($obj))
            {
                echo get_class($obj) . '<br>';
            }
            else{
                echo $obj . '<br>';
            }
        });

        app()->resolving(PowerMyService::class, function($obj, $app){
            $newdata = ['Humberg', 'Curry rice', 'Karaage', 'Gyozae'];
            $obj->setData($newdata);
            $obj->setId(rand(0, count($newdata)));
        });

        app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }
}
