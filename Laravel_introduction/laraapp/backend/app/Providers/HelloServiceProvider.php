<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'hello.index_provider', function($view){
                $view->with('view_message', 'This message is from composer message!');
            }
        );

        View::composer(
            'hello.index_composer', 'App\Http\Composers\HelloComposer'
        );
    }
}
