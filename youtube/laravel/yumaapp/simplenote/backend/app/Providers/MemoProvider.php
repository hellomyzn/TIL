<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MemoRepository;
use App\Repositories\Interfaces\MemoInterface;

class MemoProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MemoInterface::class, MemoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
