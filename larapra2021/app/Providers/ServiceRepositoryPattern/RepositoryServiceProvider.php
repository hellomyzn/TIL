<?php

namespace App\Providers\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use App\Repositories\ServiceRepositoryPattern\ServiceRepositoryPatternPostRepository;
use App\Services\ServiceRepositoryPattern\ServiceRepositoryPatternPostService;
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
        // $this->app->bind(PostRepositoryInterface::class, function ($app) {
        //     return new ServiceRepositoryPatternPostService(new ServiceRepositoryPatternPostRepository(new ServiceRepositoryPatternPost()));
        // });
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
