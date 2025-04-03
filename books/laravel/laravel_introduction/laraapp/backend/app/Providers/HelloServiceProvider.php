<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\Http\Validators\HelloValidator;

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

        $validator = $this->app['validator'];
        $validator->resolver(function($translator, $data, $rules, $messages){
            return new HelloValidator($translator, $data, $rules, $messages);
        });

    }
}
