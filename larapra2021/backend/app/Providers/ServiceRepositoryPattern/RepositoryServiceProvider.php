<?php

namespace App\Providers\ServiceRepositoryPattern;

use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use App\Repositories\ServiceRepositoryPattern\ServiceRepositoryPatternPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, ServiceRepositoryPatternPostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
